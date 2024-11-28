<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class ManageModul extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-modul')->extends('layouts.admin.app');
    }
}
