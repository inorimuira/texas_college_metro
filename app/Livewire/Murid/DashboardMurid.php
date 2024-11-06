<?php

namespace App\Livewire\Murid;

use Livewire\Component;

class DashboardMurid extends Component
{
    public function render()
    {
        return view('livewire.murid.dashboard-murid')->extends('layouts.client.app');
    }
}
