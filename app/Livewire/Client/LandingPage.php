<?php

namespace App\Livewire\Client;

use Livewire\Component;

class LandingPage extends Component
{
    public function render()
    {
        return view('livewire.client.landing-page')->extends('layouts.client.app');
    }
}
