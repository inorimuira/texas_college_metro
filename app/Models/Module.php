<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'module';

    protected $fillable = [
        'chapter_id',
        'nama_module',
        'summary',
    ];

    public function activityModule()
    {
        return $this->hasMany(ActivityModule::class);
    }

    public function bankSoals()
    {
        return $this->hasMany(BankSoal::class);
    }

    public function recordCourse()
    {
        return $this->hasMany(RecordCourse::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
