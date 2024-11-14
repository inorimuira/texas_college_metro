<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class TambahSoal extends Component
{
    public function render()
    {
        return view('livewire.admin.tambah-soal')->extends('layouts.client.app');
    }
}
