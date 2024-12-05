<?php

namespace App\Livewire\Murid;

use App\Models\Chapter;
use Livewire\Component;

class PlacementTest extends Component
{
    public $chapters;
    public function mount(Chapter $chapter){
        $this->chapters = $chapter->with(['modules.bankSoals'])->get();
    }
    public function render()
    {
        return view('livewire.murid.placement-test')->extends('layouts.client.app');
    }
}
