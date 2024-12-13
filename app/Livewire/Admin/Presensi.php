<?php

namespace App\Livewire\Admin;

use App\Models\Chapter;
use App\Models\Kelas;
use App\Models\Presensi as ModelsPresensi;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Presensi extends Component
{
    use LivewireAlert;

    public $kelas, $chapters, $nama_kelas, $id, $identity, $selectedKelas, $presensis, $idPresensi, $waktu_presensi, $status;
    public $chapter_id, $module_id, $isTambahKelas = false, $detailKelas = false, $isAktifasiPresensi = false, $isTambahPresensi = false;
    protected $listeners = ['deleteConfirmed' => 'handleConfirm'];

    public function Kelas($selectedKelasId)
    {
        $this->selectedKelas = Kelas::find($selectedKelasId);
        $this->detailKelas = true;

        $this->presensis = ModelsPresensi::where('kelas_id', $this->selectedKelas->id)
        ->with(['module:id,nama_module'])
        ->get();

    }
    public function tambahKelas()
    {
        $rules = [
            'nama_kelas' => 'required|min:3|max:255',
        ];

        $messages = [
            '*.required' => ':attribute wajib diisi',
            '*.min' => ':attribute minimal :min karakter',
            '*.max' => ':attribute maksimal :max karakter',
        ];

        $this->validate($rules, $messages);

        $kelas = new Kelas();
        $kelas->nama_kelas = $this->nama_kelas;
        $kelas->save();

        $this->reset('nama_kelas');

        $this->isTambahKelas = false;

        $this->alert('success', 'Kelas berhasil ditambahkan');
    }

    public function tambahPresensi($idkelas)
    {
        $rules = [
            'chapter_id' => 'required',
            'module_id' => 'required',
        ];
    
        $messages = [
            '*.required' => ':attribute wajib diisi',
        ];
    
        $this->validate($rules, $messages);
    
        $presensiExists = ModelsPresensi::where('kelas_id', $idkelas)
            ->where('module_id', $this->module_id)
            ->exists();
    
        if ($presensiExists) {
            $this->alert('error', 'Presensi untuk module ini sudah ada di kelas ini.');
            return;
        }
    
        $chapter = Chapter::find($this->chapter_id);
        $module = $chapter->modules()->find($this->module_id);
    
        $presensi = new ModelsPresensi();
        $presensi->kelas_id = $idkelas;
        $presensi->module_id = $this->module_id;
        $presensi->save();
    
        $this->reset('chapter_id', 'module_id');
        $this->isTambahPresensi = false;
    
        $this->kelas($this->selectedKelas->id);
    
        $this->alert('success', 'Presensi berhasil ditambahkan');
    }

    public function confirmDelete($id, $identity)
    {
        $this->id = $id;
        $this->identity = $identity;
        $this->alert('warning', 'Apakah Anda yakin ingin menghapus data '.$identity.' ini? semua data yang terkait juga akan ikut terhapus!', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ya, Hapus',
            'showCancelButton' => true,
            'cancelButtonText' => 'Batal',
            'onConfirmed' => 'deleteConfirmed',
            'timer' => null,
        ]);
    }

    public function handleConfirm()
    {
        if ($this->id) {
            $this->deleteData($this->id, $this->identity);
        }
    }

    public function deleteData($id, $identity)
    {
        if ($identity == 'kelas') {
            $kelas = Kelas::find($id);

            if ($kelas) {
                $kelas->delete();
                $this->alert('success', 'Data berhasil dihapus');
            }else{
                $this->alertDataNotFound();
            }
        }else if ($identity == 'presensi') {
            $presensi = ModelsPresensi::find($id);

            if ($presensi) {
                $presensi->delete();
                $this->alert('success', 'Data berhasil dihapus');
            }else{
                $this->alertDataNotFound();
            }

            $this->kelas($this->selectedKelas->id);
        }
    }

    public function alertDataNotFound(){
        $this->alert('warning', 'Data tidak ditemukan!', [
            'position' => 'center',
            'toast' => false,
            'timer' => 3000,
            'timerProgressBar' => true,
        ]);
    }

    public function modalAktifasiPresensi(ModelsPresensi $Presensi)
    {
        $this->isAktifasiPresensi = true;
        $this->waktu_presensi = $Presensi->waktu_tutup;
        $this->status = $Presensi->status;
        $this->idPresensi = $Presensi->id;
    }

    public function aktifasiPresensi(ModelsPresensi $presensi)
    {
        $presensiAktifLain = ModelsPresensi::where('kelas_id', $presensi->kelas_id)
            ->where('status', 1)
            ->where('id', '!=', $presensi->id)
            ->exists();

        if ($presensi->status !== 1 && $presensiAktifLain) {
            $this->alert('error', 'Tidak dapat mengaktifkan presensi. Ada presensi lain yang masih aktif untuk kelas ini.');
            return;
        }

        $rules = [
            'waktu_presensi' => 'required|date|after_or_equal:now',
            'status' => 'required',
        ];

        $messages = [
            '*.required' => ':attribute wajib diisi',
            '*.date' => ':attribute harus berupa tanggal',
            '*.after_or_equal' => ':attribute harus lebih besar atau sama dengan tanggal sekarang',
        ];

        $this->validate($rules, $messages);

        $presensi->status = $this->status;
        if ($this->status == 'aktif') {
            $presensi->waktu_tutup = $this->waktu_presensi;
        }else{
            $presensi->waktu_tutup = null;
        }
        $presensi->save();
        $this->reset(['waktu_presensi', 'status']);

        $this->isAktifasiPresensi = false;

        $this->Kelas($presensi->kelas_id);

        $this->alert('success', 'Presensi berhasil diaktifkan');
    }

    public function render()
    {
        $this->kelas = Kelas::all();

        $this->chapters = Chapter::where('nama_chapter', '!=', 'Placement Test')
            ->pluck('nama_chapter', 'id')
            ->toArray();

        $modules = Chapter::where('nama_chapter', '!=', 'Placement Test')
            ->with(['modules:id,nama_module,chapter_id'])
            ->get()
            ->flatMap(function ($chapter) {
                return $chapter->modules->map(function ($module) use ($chapter) {
                    return [
                        'id' => $module->id,
                        'name' => $module->nama_module,
                        'chapter_id' => $chapter->id,
                    ];
                });
            })
            ->toArray();

        return view('livewire.admin.presensi', [
            'modules' => $modules,
            'chapters' => $this->chapters,
        ])->extends('layouts.admin.app');
    }

}
