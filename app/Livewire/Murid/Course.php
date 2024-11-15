<?php

namespace App\Livewire\Murid;

use Livewire\Component;

class Course extends Component
{
    public function render()
    {
        return view('livewire.murid.course')->extends('layouts.client.app');
    }
}
