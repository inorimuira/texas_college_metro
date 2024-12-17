<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankSoal extends Model
{
    protected $table = 'bank_soal';

    protected $fillable = [
        'module_id',
        'question',
        'a',
        'b',
        'c',
        'd',
        'answer',
    ];
}
