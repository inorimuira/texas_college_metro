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

    public $kelas, $chapters, $nama_kelas, $id, $identity, $selectedKelas, $presensis;
    public $chapter_id, $module_id, $isTambahKelas = false, $detailKelas = false;
    protected $listeners = ['deleteConfirmed' => 'handleConfirm'];

    public function Kelas(Kelas $selectedKelas)
    {
        $this->selectedKelas = $selectedKelas;
        $this->detailKelas = true;

        $this->presensis = ModelsPresensi::where('kelas_id', $selectedKelas->id)
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

    public function tambahAbsen($idkelas)
    {
        $rules = [
            'chapter_id' => 'required',
            'module_id' => 'required',
        ];

        $messages = [
            '*.required' => ':attribute wajib diisi',
        ];

        $this->validate($rules, $messages);

        $chapter = Chapter::find($this->chapter_id);
        $module = $chapter->modules()->find($this->module_id);

        $presensi = new ModelsPresensi();
        $presensi->kelas_id = $idkelas;
        $presensi->module_id = $this->module_id;
        $presensi->save();

        $this->reset('chapter_id', 'module_id');
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
            } else {
                $this->alertDataNotFound();
            }
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

        // Log modules for debugging
        logger($modules);

        return view('livewire.admin.presensi', [
            'modules' => $modules,
            'chapters' => $this->chapters,
        ])->extends('layouts.admin.app');
    }

}
