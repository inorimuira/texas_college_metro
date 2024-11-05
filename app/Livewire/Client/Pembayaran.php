<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Pembayaran extends Component
{
    public function render()
    {
        return view('livewire.client.pembayaran')->extends('layouts.client.app');
    }
}
