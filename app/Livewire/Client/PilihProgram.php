<?php

namespace App\Livewire\Client;

use Livewire\Component;

class PilihProgram extends Component
{
    public function render()
    {
        return view('livewire.client.pilih-program')->extends('layouts.client.app');
    }
}
