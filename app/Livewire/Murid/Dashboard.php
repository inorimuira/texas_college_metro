<?php

namespace App\Livewire\Murid;

use App\Models\Chapter;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $firstIncompleteChapter = null, $progressPercentage = 0, $chapterId;

    public function mount()
    {
        $this->findFirstIncompleteChapter();
    }

    protected function calculateProgress($chapterId)
    {
        $userId = Auth::id();

        $totalModules = Module::where('chapter_id', $chapterId)->count();

        $completedModules = Module::whereHas('recordCourse', function($query) use ($userId, $chapterId) {
            $query->where('user_id', $userId)
                  ->where('chapter_id', $chapterId)
                  ->where('status', true);
        })->count();

        $this->progressPercentage = $totalModules > 0
            ? intval(round(($completedModules / $totalModules) * 100))
            : 0;
    }


    protected function findFirstIncompleteChapter()
    {
        $this->firstIncompleteChapter = Chapter::whereHas('modules', function($query) {
            $query->whereDoesntHave('recordCourse', function($subQuery) {
                $subQuery->where('user_id', Auth::id())
                         ->where('status', true);
            });
        })
        ->with(['modules' => function($query) {
            $query->with(['activityModule', 'recordCourse'])
                  ->whereDoesntHave('recordCourse', function($subQuery) {
                      $subQuery->where('user_id', Auth::id())
                               ->where('status', true);
                  });
        }])
        ->first();

        $this->chapterId = $this->firstIncompleteChapter ? $this->firstIncompleteChapter->id : null;

        $this->calculateProgress($this->chapterId);
    }

    public function render()
    {
        return view('livewire.murid.dashboard', [
            'chapters' => $this->firstIncompleteChapter,
            'percentage' => round($this->progressPercentage)
        ])->extends('layouts.murid.app');
    }
}
