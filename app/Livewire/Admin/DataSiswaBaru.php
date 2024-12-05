<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class DataSiswaBaru extends Component
{
    public function render()
    {
        return view('livewire.admin.data-siswa-baru')->extends('layouts.admin.app');
    }
}
