<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecordCourse extends Model
{
    protected $table = 'record_course';

    protected $fillable = [
        'user_id',
        'module_id',
        'status',
        'score',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
