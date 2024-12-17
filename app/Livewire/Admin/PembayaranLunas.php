<?php

namespace App\Livewire\Admin;

use App\Models\Tagihan;
use App\Models\User;
use Livewire\Component;

class PembayaranLunas extends Component
{
    public $data;

    public function mount()
    {
        $muridList = User::whereHas('murid.tagihan', function ($query) {
            $query->where('status_tagihan', 'Lunas');
        })
        ->with(['murid.tagihan' => function ($query) {
            $query->where('status_tagihan', 'Lunas')
                  ->with('angsuran');
        }])
        ->get();

        dd($muridList);
    }

    public function render()
    {
        return view('livewire.admin.pembayaran-lunas')->extends('layouts.admin.app');
    }
}
