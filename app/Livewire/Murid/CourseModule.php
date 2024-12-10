<?php

namespace App\Livewire\Murid;

use App\Models\Chapter;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseModule extends Component
{
    public $moduleId, $chapters, $module, $percentage;

    public function mount(Request $request)
    {
        $chapterId = $request->moduleId
            ? Module::findOrFail($request->moduleId)->chapter_id
            : $request->chapterId;

        $this->chapters = Chapter::with([
            'modules' => function($query) {
                $query->with([
                    'activityModule',
                    'bankSoals',
                    'recordCourse' => fn($q) => $q->where('user_id', Auth::id())
                ]);
            }
        ])->findOrFail($chapterId);

        $this->module = $request->moduleId
            ? $this->chapters->modules->firstWhere('id', $request->moduleId)
            : $this->chapters->modules->first();

        // Hitung percentage berdasarkan recordCourse
        $totalModules = $this->chapters->modules->count();
        $completedModules = $this->chapters->modules->filter(function($module) {
            return $module->recordCourse->first() &&
                $module->recordCourse->first()->status === 1;
        })->count();

        $this->percentage = $totalModules > 0
            ? round(($completedModules / $totalModules) * 100, 2)
            : 0;
    }

    public function changeModule($moduleId)
    {
        // Cari chapterId dari module yang dipilih
        $chapterId = Module::findOrFail($moduleId)->chapter_id;

        // Reload chapters dengan module yang dipilih
        $this->chapters = Chapter::with([
            'modules' => function($query) {
                $query->with([
                    'activityModule',
                    'bankSoals',
                    'recordCourse' => fn($q) => $q->where('user_id', Auth::id())
                ]);
            }
        ])->findOrFail($chapterId);

        // Set module yang dipilih
        $this->module = $this->chapters->modules->firstWhere('id', $moduleId);
    }

    public function render()
    {
        return view('livewire.murid.course-module', [
            'chapter' => $this->chapters
        ])->extends('layouts.client.app');
    }

}
