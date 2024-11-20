<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class ManageChapter extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-chapter')->extends('layouts.admin.app');
    }
}
