<?php

namespace App\Livewire\Admin;

use App\Models\MuridLama;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class TambahMurid extends Component
{
    use LivewireAlert;
    public $nama, $email, $program, $tingkat_pemahaman, $no_whatsapp, $tanggal_lahir,  $nik_nisn, $asal_sekolah, $nama_ayah, $pekerjaan_ayah, $nama_ibu, $pekerjaan_ibu, $alamat_domisili, $alamat_sekolah;
    protected $listeners = ['simpan' => 'viewChanges'];

    public function simpan()
    {
        $rules = [
            'nama' => 'required|min:3|max:255',
            'email' => 'required|email|unique:murid_lama,email',
            'program' => 'required',
            'tingkat_pemahaman' => 'required|min:3|max:255',
            'no_whatsapp' => 'required|min:10|unique:murid_lama,nomor_whatsapp',
            'tanggal_lahir' => 'required|date',
            'nik_nisn' => 'required|unique:murid_lama,nik_nisn',
            'asal_sekolah' => 'required|min:3|max:255',
            'nama_ayah' => 'required|min:3|max:255',
            'pekerjaan_ayah' => 'required|min:3|max:255',
            'nama_ibu' => 'required|min:3|max:255',
            'pekerjaan_ibu' => 'required|min:3|max:255',
            'alamat_domisili' => 'required|min:3',
            'alamat_sekolah' => 'required|min:3',
        ];

        $messages = [
            '*.required' => ':attribute wajib diisi',
            '*.min' => ':attribute minimal :min karakter',
            '*.max' => ':attribute maksimal :max karakter',
            '*.date' => ':attribute harus berupa tanggal',
            '*.email' => ':attribute harus berupa email',
            '*.unique' => ':attribute sudah terdaftar',
            '*.numeric' => ':attribute harus berupa angka',
        ];

        $this->validate($rules, $messages);

        $murid = new MuridLama();
        $murid->nama = $this->nama;
        $murid->email = $this->email;
        $murid->program = $this->program;
        $murid->tingkat_pemahaman = $this->tingkat_pemahaman;
        $murid->nomor_whatsapp = $this->no_whatsapp;
        $murid->tgl_lahir = $this->tanggal_lahir;
        $murid->nik_nisn = $this->nik_nisn;
        $murid->asal_sekolah = $this->asal_sekolah;
        $murid->nama_ayah = $this->nama_ayah;
        $murid->pekerjaan_ayah = $this->pekerjaan_ayah;
        $murid->nama_ibu = $this->nama_ibu;
        $murid->pekerjaan_ibu = $this->pekerjaan_ibu;
        $murid->alamat_domisili = $this->alamat_domisili;
        $murid->alamat_sekolah = $this->alamat_sekolah;
        $murid->save();

        $this->reset([
            'nama', 'email', 'program', 'tingkat_pemahaman', 'no_whatsapp', 'tanggal_lahir',  'nik_nisn', 'asal_sekolah', 'nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu', 'alamat_domisili', 'alamat_sekolah',
        ]);

        $this->showAlert();

    }

    public function showAlert()
    {
        $this->alert('success', 'Data berhasil diperbarui!', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Lihat Perubahan',
            'showCancelButton' => true,
            'cancelButtonText' => 'Tutup',
            'onConfirmed' => 'simpan',
            'timer' => 5000,
            'timerProgressBar' => true,
        ]);
    }

    public function viewChanges()
    {
        redirect()->intended(route('admin.data-murid-lama'));
    }

    public function render()
    {
        return view('livewire.admin.tambah-siswa')->extends('layouts.admin.app');
    }
}
