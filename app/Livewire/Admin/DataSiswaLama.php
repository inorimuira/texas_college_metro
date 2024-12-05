<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class DataSiswaLama extends Component
{
    public function render()
    {
        return view('livewire.admin.data-siswa-lama')->extends('layouts.admin.app');
    }
}
