<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class DataSiswa extends Component
{
    public function render()
    {
        return view('livewire.admin.data-siswa')->extends('layouts.admin.app');
    }
}
