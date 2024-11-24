<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Rekapabsen extends Component
{
    public function render()
    {
        return view('livewire.admin.rekapabsen')->extends('layouts.admin.app');
    }
}
