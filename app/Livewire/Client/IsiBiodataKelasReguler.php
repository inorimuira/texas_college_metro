<?php

namespace App\Livewire\Client;

use App\Models\Pendaftaran;
use Livewire\Component;

class IsiBiodataKelasReguler extends Component
{
    public $nama_lengkap, $email, $username, $password, $nomor_whatsapp, $tgl_lahir, $nik_nisn, $asal_sekolah, $nama_ayah, $pekerjaan_ayah, $nama_ibu, $pekerjaan_ibu, $alamat_domisili, $alamat_sekolah, $jadwal="Senin", $nomor_rekening, $atas_nama_rekening, $nominal_pembayaran, $bukti_pembayaran;

    public function Simpan(){
        $rules = [
            'nama_lengkap' => 'required|min:3|max:255',
            'email' => 'required|email|unique:pendaftaran,email|unique:users,email',
            'username' => 'required|min:3|max:255|unique:pendaftaran,username|unique:users,username',
            'password' => 'required|min:8',
            'nomor_whatsapp' => 'required|min:10|unique:pendaftaran,nomor_whatsapp',
            'tgl_lahir' => 'required|date',
            'nik_nisn' => 'required|unique:pendaftaran',
            'asal_sekolah' => 'required|min:3|max:255',
            'nama_ayah' => 'required|min:3|max:255',
            'pekerjaan_ayah' => 'required|min:3|max:255',
            'nama_ibu' => 'required|min:3|max:255',
            'pekerjaan_ibu' => 'required|min:3|max:255',
            'alamat_domisili' => 'required|min:3',
            'alamat_sekolah' => 'required|min:3',
            // 'jadwal' => 'required',
            // 'atas_nama_rekening' => 'required|min:3|max:255',
            // 'nomor_rekening' => 'required|numeric',
            // 'nominal_pembayaran' => 'required|numeric',
            // 'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
        $messages = [
            '*.required' => ':attribute wajib diisi',
            '*.min' => ':attribute minimal :min karakter',
            '*.max' => ':attribute maksimal :max karakter',
            '*.unique' => ':attribute sudah terdaftar',
            '*.date' => ':attribute harus berupa tanggal',
        ];
        $this->validate($rules);

        $pendaftaran = new Pendaftaran();
        $pendaftaran->nama_lengkap = $this->nama_lengkap;
        $pendaftaran->email = $this->email;
        $pendaftaran->username = $this->username;
        $pendaftaran->password = bcrypt($this->password);
        $pendaftaran->nomor_whatsapp = $this->nomor_whatsapp;
        $pendaftaran->tgl_lahir = $this->tgl_lahir;
        $pendaftaran->nik_nisn = $this->nik_nisn;
        $pendaftaran->asal_sekolah = $this->asal_sekolah;
        $pendaftaran->nama_ayah = $this->nama_ayah;
        $pendaftaran->pekerjaan_ayah = $this->pekerjaan_ayah;
        $pendaftaran->nama_ibu = $this->nama_ibu;
        $pendaftaran->pekerjaan_ibu = $this->pekerjaan_ibu;
        $pendaftaran->alamat_domisili = $this->alamat_domisili;
        $pendaftaran->alamat_sekolah = $this->alamat_sekolah;
        $pendaftaran->jadwal = $this->jadwal;
        $pendaftaran->save();

        $this->reset([
            'nama_lengkap',
            'email',
            'username',
            'password',
            'nomor_whatsapp',
            'tgl_lahir',
            'nik_nisn',
            'asal_sekolah',
            'nama_ayah',
            'pekerjaan_ayah',
            'nama_ibu',
            'pekerjaan_ibu',
            'alamat_domisili',
            'alamat_sekolah',
            'jadwal',
            'atas_nama_rekening',
            'nomor_rekening',
            'nominal_pembayaran',
            'bukti_pembayaran',
        ]);
        return redirect(route('landingpage'));
    }

    public function render()
    {
        return view('livewire.client.isi-biodata-kelas-reguler')->extends('layouts.client.app');
    }
}
