<?php

namespace App\Livewire\Client;

use App\Models\Pendaftaran;
use Livewire\Component;

class Pembayaran extends Component
{
    public $id, $program;

    public function mount($program, Pendaftaran $pendaftaran){
        $this->program = $program;
        $this->id = $pendaftaran->id;
    }
    public function render()
    {
        return view('livewire.client.pembayaran')->extends('layouts.client.app');
    }
}
