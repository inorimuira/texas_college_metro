<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'module';

    protected $fillable = [
        'chapter_id',
        'nama_module',
        'summarry'
    ];
}
