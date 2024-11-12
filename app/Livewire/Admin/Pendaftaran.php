<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Pendaftaran extends Component
{
    public function render()
    {
        return view('livewire.admin.pendaftaran')->extends('layouts.client.app');
    }
}
