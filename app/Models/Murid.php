<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';

    protected $fillable = [
        'users_id',
        'semester_aktif',
        'nomor_whatsapp',
        'tgl_lahir',
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
