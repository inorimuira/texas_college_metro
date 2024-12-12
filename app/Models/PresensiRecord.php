<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresensiRecord extends Model
{
    protected $table = 'presensi_record';

    protected $fillable = [
        'presensi_id',
        'user_id',
        'status',
    ];
}
