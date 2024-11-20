<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    protected $table = 'angsuran';

    protected $fillable = [
        'tagihan_id',
        'nomor_rekening_pengirim',
        'atas_nama_rekening_pengirim',
        'nominal',
        'bukti_bayar',
        'jenis_pembayaran',
    ];
}
