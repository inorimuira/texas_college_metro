<?php

namespace App\Livewire\Murid;

use Livewire\Component;

class CourseModule extends Component
{
    public function render()
    {
        return view('livewire.murid.course-module')->extends('layouts.client.app');
    }
}
