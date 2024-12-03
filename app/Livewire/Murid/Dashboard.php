<?php

namespace App\Livewire\Murid;

use App\Models\Chapter;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $chapters = Chapter::with(['modules' => function($query) {
            $query->with(['activityModule', 'bankSoals']);
        }])->get();
        return view('livewire.murid.dashboard', [
            'chapters' => $chapters,
            ])->extends('layouts.client.app');
    }
}
