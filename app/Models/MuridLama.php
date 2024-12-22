<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MuridLama extends Model
{
    protected $table = 'murid_lama';

    protected $fillable = [
        'name',
        'email',
        'program',
        'tingkat_pemahaman',
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
    ];
}
