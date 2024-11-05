<?php

namespace App\Livewire\Client;

use Livewire\Component;

class IsiBiodata extends Component
{
    public function render()
    {
        return view('livewire.client.isi-biodata')->extends('layouts.client.app');
    }
}
