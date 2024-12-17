<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensi';

    protected $fillable = [
        'kelas_id',
        'module_id',
        'status',
        'close_time',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function presensiRecord()
    {
        return $this->hasMany(PresensiRecord::class);
    }
}
