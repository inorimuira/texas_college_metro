<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityModule extends Model
{
    protected $table = 'activity_module';

    protected $fillable = [
        'module_id',
        'type',
        'judul',
        'link',
        'text',
    ];
}
