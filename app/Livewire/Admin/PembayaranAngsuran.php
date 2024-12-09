<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class PembayaranAngsuran extends Component
{
    public function render()
    {
        return view('livewire.admin.pembayaran-angsuran')->extends('layouts.admin.app');
    }
}
