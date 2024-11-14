<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semester';

    protected $fillable = [
        'murid_id',
        'nomor_semester',
        'satatus_aktif',
        'tgl_mulai',
        'tgl_selesai',
        'jenis_program'
    ];
}
