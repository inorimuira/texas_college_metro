<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';

    protected $fillable = [
        'user_id',
        'tingkat_pemahaman',
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
        'keperluan_khusus',
    ];

}
