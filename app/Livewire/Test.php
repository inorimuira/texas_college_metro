<?php

namespace App\Livewire;

use Livewire\Component;

class Test extends Component
{
    public function render()
    {
        return view('livewire.test')->extends('layouts.admin.app');
    }
}
