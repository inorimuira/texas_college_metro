<?php

namespace App\Livewire\Murid;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.murid.dashboard')->extends('layouts.client.app');
    }
}
