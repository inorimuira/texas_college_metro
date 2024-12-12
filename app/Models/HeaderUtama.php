<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderUtama extends Model
{
    protected $table = 'header_utama';

    protected $fillable = [
        'title',
        'subtitle',
        'image',
    ];
}
