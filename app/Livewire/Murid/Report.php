<?php

namespace App\Livewire\Murid;

use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Report extends Component
{
    public $data;

    public function render()
    {
        $this->data = Chapter::with([
                'modules' => function ($query) {
                    $query->select('id', 'chapter_id', 'nama_module')
                          ->where('nama_module', '!=', 'Placement Test')
                          ->where(function ($query) {
                              $query->whereHas('recordCourse')
                                    ->orWhereHas('presensiRecord');
                          });
                },
                'modules.recordCourse' => function ($query) {
                    $query->select('id', 'module_id', 'score', 'user_id')
                          ->where('user_id', Auth::id());
                },
                'modules.presensiRecord' => function ($query) {
                    $query->select('id', 'module_id', 'status', 'created_at', 'user_id')
                          ->where('user_id', Auth::id());
                }
            ])
            ->select('id', 'nama_chapter')
            ->where('nama_chapter', '!=', 'Placement Test')
            ->whereHas('modules', function ($query) {
                $query->where(function ($query) {
                    $query->whereHas('recordCourse')
                          ->orWhereHas('presensiRecord');
                });
            })
            ->get();

        return view('livewire.murid.report')->extends('layouts.murid.app');
    }
}
