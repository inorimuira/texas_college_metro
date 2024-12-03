<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapter';

    protected $fillable = [
        'nama_chapter'
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
