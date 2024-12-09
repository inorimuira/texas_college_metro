<?php

namespace App\Livewire\Murid;

use App\Models\Chapter;
use Livewire\Component;

class Course extends Component
{
        public $chapters;

    public function mount(Chapter $chapter)
    {
        $this->chapters = $chapter->with(['modules' => function($query) {
            $query->with(['activityModule', 'bankSoals', 'recordCourse']);
        }])->get();
    }
    public function render()
    {
        return view('livewire.murid.course')->extends('layouts.client.app');
    }
}
