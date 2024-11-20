<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihan';

    protected $fillable = [
        'murid_id',
        'semester_id',
        'potongan_harga',
        'total_tagihan',
        'jenis_pembayaran',
        'status_tagihan',
    ];
}
