<?php

namespace App\Livewire\Murid;

use Livewire\Component;

class Report extends Component
{
    public function render()
    {
        return view('livewire.murid.report')->extends('layouts.murid.app');
    }
}
