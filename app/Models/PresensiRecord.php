<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresensiRecord extends Model
{
    protected $table = 'presensi_record';

    protected $fillable = [
        'presensi_id',
        'user_id',
        'module_id',
        'status',
    ];

    public function presensi()
    {
        return $this->belongsTo(PresensiRecord::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
