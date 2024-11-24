<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Absensi extends Component
{
    public function render()
    {
        return view('livewire.admin.absensi')->extends('layouts.admin.app');
    }
}
