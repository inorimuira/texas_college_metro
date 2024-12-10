<?php

namespace App\Livewire\Murid;

use App\Models\ActivityModule;
use Livewire\Component;

class CourseReading extends Component
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
        return view('livewire.murid.course-reading')->extends('layouts.client.app');
    }
}
