<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    protected $table = 'certificate';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'index_number',
        'grade',
        'predikat',
        'tgl_generate',
    ];
}
