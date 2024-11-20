<?php

namespace App\Livewire\Admin;

use App\Mail\ValidationInfoMail;
use App\Models\Angsuran;
use App\Models\Murid;
use App\Models\Pendaftaran as ModelsPendaftaran;
use App\Models\Semester;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Pendaftaran extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'tailwind', $listeners = ['deleteConfirmed' => 'handleConfirm'];

    public $search = '',
           $selectedStudent,
           $showPopupInfo = false,
           $id_pendaftaran = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function selectStudent(ModelsPendaftaran $id)
    {
        $this->selectedStudent = $id;
        $this->showPopupInfo = true;
    }

    public function validateAccount(ModelsPendaftaran $pendaftaran)
    {
        try {
            DB::transaction(function () use ($pendaftaran) {
                $pendaftaran->update(['status' => true]);

                $user = User::create([
                    'name' => $pendaftaran->nama_lengkap,
                    'username' => $pendaftaran->username,
                    'email' => $pendaftaran->email,
                    'password' => Hash::make($pendaftaran->password),
                ]);

                $user->assignRole('murid');

                $muridData = [
                    'users_id' => $user->id,
                    'nomor_whatsapp' => $pendaftaran->nomor_whatsapp,
                    'tgl_lahir' => $pendaftaran->tgl_lahir,
                    'nik_nisn' => $pendaftaran->nik_nisn,
                    'nama_ayah' => $pendaftaran->nama_ayah,
                    'pekerjaan_ayah' => $pendaftaran->pekerjaan_ayah,
                    'nama_ibu' => $pendaftaran->nama_ibu,
                    'pekerjaan_ibu' => $pendaftaran->pekerjaan_ibu,
                    'alamat_domisili' => $pendaftaran->alamat_domisili,
                    'alamat_sekolah' => $pendaftaran->alamat_sekolah,
                    'asal_sekolah' => $pendaftaran->asal_sekolah,
                ];

                if ($pendaftaran->keperluan_khusus !== null) {
                    $muridData['keperluan_khusus'] = $pendaftaran->keperluan_khusus;
                }

                $murid = Murid::create($muridData);

                $semester = Semester::create([
                    'murid_id' => $murid->id,
                    'nomor_semester' => 1,
                    'status_aktif' => true,
                    'jenis_program' => $pendaftaran->keperluan_khusus == null ? "Reguler" : "Unggulan",
                ]);

                $tagihan = Tagihan::create([
                    'murid_id' => $murid->id,
                    'semester_id' => $semester->id,
                    'potongan_harga' => $pendaftaran->jenis_pembayaran == "Lunas" ? 200000 : 0,
                    'total_tagihan' => 1700000,
                    'jenis_pembayaran' => $pendaftaran->jenis_pembayaran,
                    'status_tagihan' => $pendaftaran->jenis_pembayaran == "Lunas" ? "Lunas" : "Belum Lunas",
                ]);

                if ($tagihan->status_tagihan == "Lunas") {
                    $sourcePath = ($semester->jenis_program == "Reguler") ? 'pendaftaran/reguler/' . $pendaftaran->bukti_pembayaran : 'pendaftaran/unggulan/' . $pendaftaran->bukti_pembayaran;
                    $destinationPath = ($semester->jenis_program == "Reguler") ? 'angsuran/reguler/' . $pendaftaran->bukti_pembayaran : 'angsuran/ unggulan/' . $pendaftaran->bukti_pembayaran;

                    if (Storage::disk('public')->exists($sourcePath)) {
                        Storage::disk('public')->copy($sourcePath, $destinationPath);
                    }

                    Angsuran::create([
                        'tagihan_id' => $tagihan->id,
                        'nomor_rekening_pengirim' => $pendaftaran->nomor_rekening_pengirim,
                        'atas_nama_rekening_pengirim' => $pendaftaran->atas_nama_rekening_pengirim,
                        'nominal' => $pendaftaran->nominal_pembayaran,
                        'bukti_bayar' => $pendaftaran->bukti_pembayaran,
                        'jenis_pembayaran' => "Non Tunai"
                    ]);
                }

                Mail::to($pendaftaran->email)->send(new ValidationInfoMail($pendaftaran->nama_lengkap));
            });

            $this->showPopupInfo = false;
            
            $this->alert('success', 'Berhasil Melakukan Validasi', [
                'toast' => false,
                'position' => 'center',
                'timer' => 1500,
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('error', 'Terjadi kesalahan: ' . $e->getMessage(), [
                'toast' => false,
                'position' => 'center',
                'timer' => 1500,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function confirmDelete($id_pendaftaran)
    {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->alert('warning', 'Apakah Anda yakin ingin menghapus data ini?', [
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
        if ($this->id_pendaftaran) {
            $pendaftaran = ModelsPendaftaran::find($this->id_pendaftaran);

            if ($pendaftaran) {
                $this->deletePermission($pendaftaran);
            } else {
                $this->alert('error', 'Data tidak ditemukan.');
            }
        }
    }

    public function deletePermission(ModelsPendaftaran $id_pendaftaran)
    {
        $id_pendaftaran->delete();
        $this->alert('success', 'data berhasil dihapus.');
    }

    public function render()
    {
        $pendaftaranQuery = ModelsPendaftaran::where('nama_lengkap', 'like', '%' . $this->search . '%')
            ->orderBy('status', 'asc')
            ->paginate(15); // Mengatur pagination ke 2

        return view('livewire.admin.pendaftaran', [
            'data' => $pendaftaranQuery
        ])->extends('layouts.admin.app');
    }
}
