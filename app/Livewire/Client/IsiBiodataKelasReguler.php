<?php

namespace App\Livewire\Client;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class IsiBiodataKelasReguler extends Component
{
    use WithFileUploads;

    public $nama_lengkap,
    $email,
    $username,
    $password,
    $nomor_whatsapp,
    $tgl_lahir,
    $tingkat_pendidikan,
    $nik_nisn,
    $nama_ayah,
    $pekerjaan_ayah,
    $nama_ibu,
    $pekerjaan_ibu,
    $alamat_domisili,
    $alamat_sekolah,
    $asal_sekolah,
    $jadwal,
    $nomor_rekening_pengirim,
    $atas_nama_rekening_pengirim,
    $nominal_pembayaran,
    $jenis_pembayaran,
    $rekening_tujuan,
    $bukti_pembayaran,
    $showSection1 = true,
    $showSection2 = false,
    $isModalOpen = false,
    $isSimpanJawaban = false,
    $errors = [];

    public function rulesMessages(){
        if($this->jenis_pembayaran == "Lunas"){
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
                'asal_sekolah' => 'required|min:3|max:255',
                'jenis_pembayaran' => 'required',
                'jadwal' => 'required',
                'nomor_rekening_pengirim' => 'required|numeric|min:10',
                'atas_nama_rekening_pengirim' => 'required|min:3|max:255',
                'nominal_pembayaran' => 'required|numeric|size:1600000',
                'rekening_tujuan' => 'required',
                'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ];
            $messages = [
                'nominal_pembayaran.size' => 'Untuk jenis pembayaran Lunas nominal pembayaran harus Rp 1.600.000 sudah termasuk biaya pendaftaran dan potongan sebesar Rp 200.000.',
                '*.max' => ':attribute maksimal :max karakter',
                '*.min' => ':attribute minimal :min karakter',
                '*.required' => ':attribute wajib diisi',
                '*.unique' => ':attribute sudah terdaftar',
                '*.date' => ':attribute harus berupa tanggal',
                '*.numeric' => ':attribute harus berupa angka',
                '*.email' => ':attribute harus berupa email',
                '*.image' => ':attribute harus berupa gambar',
                '*.mimes' => ':attribute harus berupa gambar dengan format jpeg, png, jpg',
            ];
        }else if($this->jenis_pembayaran == "Angsuran"){

            $rules = [
                'nama_lengkap' => 'required|min:3|max:255',
                'email' => 'required|email|unique:pendaftaran,email|unique:users,email',
                'username' => 'required|min:3|max:255|unique:pendaftaran,username|unique:users,username',
                'password' => 'required|min:8',
                'nomor_whatsapp' => 'required|min:10|unique:pendaftaran,nomor_whatsapp',
                'tgl_lahir' => 'required|date',
                'tingkat_pendidikan' => 'required',
                'nik_nisn' => 'required|unique:pendaftaran',
                'asal_sekolah' => 'required|min:3|max:255',
                'nama_ayah' => 'required|min:3|max:255',
                'pekerjaan_ayah' => 'required|min:3|max:255',
                'nama_ibu' => 'required|min:3|max:255',
                'pekerjaan_ibu' => 'required|min:3|max:255',
                'alamat_domisili' => 'required|min:3',
                'alamat_sekolah' => 'required|min:3',
                'asal_sekolah' => 'required|min:3|max:255',
                'jenis_pembayaran' => 'required',
                'jadwal' => 'required',
                'nomor_rekening_pengirim' => 'required|numeric|min:10',
                'atas_nama_rekening_pengirim' => 'required|min:3|max:255',
                'nominal_pembayaran' => 'required|numeric|size:100000',
                'rekening_tujuan' => 'required',
                'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ];
            $messages = [
                'nominal_pembayaran.size' => 'Untuk jenis pembayaran Angsuran nominal pembayaran harus Rp 100.000 hanya untuk biaya pendaftaran.',
                '*.required' => ':attribute wajib diisi',
                '*.min' => ':attribute minimal :min karakter',
                '*.max' => ':attribute maksimal :max karakter',
                '*.unique' => ':attribute sudah terdaftar',
                '*.date' => ':attribute harus berupa tanggal',
                '*.numeric' => ':attribute harus berupa angka',
                '*.email' => ':attribute harus berupa email',
                '*.image' => ':attribute harus berupa gambar',
                '*.mimes' => ':attribute harus berupa gambar dengan format jpeg, png, jpg',
            ];
        }
            $this->validate($rules, $messages);
    }

    public function Simpan()
    {
        try {
            $this->rulesMessages();

            $customFileName = str_replace(' ', '-', $this->nama_lengkap).'-'.time() . '-bukti-pembayaran.'.$this->bukti_pembayaran->extension();
            $this->bukti_pembayaran->storeAs('pendaftaran/reguler', $customFileName, 'public');

            $pendaftaran = new Pendaftaran();
            $pendaftaran->nama_lengkap = $this->nama_lengkap;
            $pendaftaran->email = $this->email;
            $pendaftaran->username = $this->username;
            $pendaftaran->password = $this->password;
            $pendaftaran->nomor_whatsapp = $this->nomor_whatsapp;
            $pendaftaran->tgl_lahir = $this->tgl_lahir;
            $pendaftaran->tingkat_pendidikan = $this->tingkat_pendidikan;
            $pendaftaran->nik_nisn = $this->nik_nisn;
            $pendaftaran->asal_sekolah = $this->asal_sekolah;
            $pendaftaran->nama_ayah = $this->nama_ayah;
            $pendaftaran->pekerjaan_ayah = $this->pekerjaan_ayah;
            $pendaftaran->nama_ibu = $this->nama_ibu;
            $pendaftaran->pekerjaan_ibu = $this->pekerjaan_ibu;
            $pendaftaran->alamat_domisili = $this->alamat_domisili;
            $pendaftaran->alamat_sekolah = $this->alamat_sekolah;
            $pendaftaran->jadwal = $this->jadwal;
            $pendaftaran->nomor_rekening_pengirim = $this->nomor_rekening_pengirim;
            $pendaftaran->atas_nama_rekening_pengirim = $this->atas_nama_rekening_pengirim;
            $pendaftaran->nominal_pembayaran = str_replace('.', '', $this->nominal_pembayaran);
            $pendaftaran->jenis_pembayaran = $this->jenis_pembayaran;
            $pendaftaran->rekening_tujuan = $this->rekening_tujuan;
            $pendaftaran->bukti_pembayaran = $customFileName;
            $pendaftaran->save();

            $this->reset([
                'nama_lengkap',
                'email',
                'username',
                'password',
                'nomor_whatsapp',
                'tgl_lahir',
                'tingkat_pendidikan',
                'nik_nisn',
                'asal_sekolah',
                'nama_ayah',
                'pekerjaan_ayah',
                'nama_ibu',
                'pekerjaan_ibu',
                'alamat_domisili',
                'alamat_sekolah',
                'jadwal',
                'nomor_rekening_pengirim',
                'atas_nama_rekening_pengirim',
                'nominal_pembayaran',
                'jenis_pembayaran',
                'rekening_tujuan',
                'bukti_pembayaran',
            ]);

            $this->isModalOpen = false;
            $this->isSimpanJawaban = true;
            $this->clean_tmp();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->isModalOpen = false;
            $this->showSection1 = true;
            $this->showSection2 = false;

            $this->errors = $e->validator->errors()->toArray();
        }
    }

        public function clean_tmp(){
            $tmp = Storage::files('livewire-tmp');
            foreach($tmp as $t){
                Storage::delete($t);
            }
        }

    public function render()
    {
    return view('livewire.client.isi-biodata-kelas-reguler')->extends('layouts.client.app');
    }
}
