<?php

namespace App\Livewire\Murid;

use Livewire\Component;

class CourseVideo extends Component
{
    public function mount($activityId)
    {

    }
    public function render()
    {
        return view('livewire.murid.course-video')->extends('layouts.client.app');
    }
}
