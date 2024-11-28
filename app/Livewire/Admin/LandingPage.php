<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class LandingPage extends Component
{
    public function render()
    {
        return view('livewire.admin.landing-page')->extends('layouts.admin.app');
    }
}
