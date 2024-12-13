<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class PembayaranLunas extends Component
{
    public function render()
    {
        return view('livewire.admin.pembayaran-lunas')->extends('layouts.admin.app');
    }
}
