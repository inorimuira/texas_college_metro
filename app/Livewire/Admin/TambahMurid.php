<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class TambahMurid extends Component
{
    public function render()
    {
        return view('livewire.admin.tambah-siswa')->extends('layouts.admin.app');
    }
}
