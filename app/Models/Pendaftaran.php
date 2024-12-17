<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{

    protected $table = 'pendaftaran';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'username',
        'password',
        'semester_aktif',
        'nomor_whatsapp',
        'tgl_lahir',
        'tingkat_pendidikan',
        'nik_nisn',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'alamat_domisili',
        'alamat_sekolah',
        'asal_sekolah',
        'jadwal',
        'nomor_rekening_pengirim',
        'atas_nama_rekening_pengirim',
        'nominal_pembayaran',
        'jenis_pembayaran',
        'rekening_tujuan',
        'bukti_pembayaran',
        'keperluan_khusus',
        'status',
    ];
}
