<?php

namespace App\Livewire\Murid;

use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Course extends Component
{
        public $chapters;

    public function mount()
    {
        $userId = Auth::id();

        $this->chapters = Chapter::where('nama_chapter', '!=', 'Placement Test')
            ->with(['modules' => function($query) use ($userId) {
                $query->withCount([
                    'recordCourse' => function($subQuery) use ($userId) {
                        $subQuery->where('user_id', $userId)
                                 ->where('status', true);
                    }
                ]);
            }])
            ->get()
            ->map(function($chapter) {
                $totalModules = $chapter->modules->count();
                $completedModules = $chapter->modules->sum('record_course_count');

                $chapter->percentage = $totalModules > 0
                    ? round(($completedModules / $totalModules) * 100, 0)
                    : 0;

                return $chapter;
            });
    }
    public function render()
    {
        return view('livewire.murid.course')->extends('layouts.murid.app');
    }
}
