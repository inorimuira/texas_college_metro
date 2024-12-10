<?php

namespace App\Livewire\Murid;

use Livewire\Component;

class CourseReading extends Component
{
    public function mount($activityId)
    {

    }
    public function render()
    {
        return view('livewire.murid.course-reading')->extends('layouts.client.app');
    }
}
