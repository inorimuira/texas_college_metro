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
        'keperluan_khusus',
        'status',
    ];
}
