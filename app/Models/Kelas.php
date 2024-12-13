<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'kelas_murid');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}
