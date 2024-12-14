<?php

namespace App\Livewire\Murid;

use App\Models\ActivityModule;
use Livewire\Component;

class CourseVideo extends Component
{
    public $activity;

    public function mount($activityId = null)
    {
        if ($activityId) {
            $this->activity = ActivityModule::find($activityId);
        } else {
            $this->activity = null;
        }
    }
    public function render()
    {
        return view('livewire.murid.course-video')->extends('layouts.murid.app');
    }
}
