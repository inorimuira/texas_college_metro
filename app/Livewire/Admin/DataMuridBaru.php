<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class DataMuridBaru extends Component
{
    public $data, $muridPreview, $search = '';
    public $isPreviewMurid = false;

    public function selectStudent($idUser)
    {
        $this->isPreviewMurid = true;
        $this->muridPreview = User::with(['murid.semester' => function($query) {
             $query->select('murid_id', 'jenis_program')
                   ->where('status_aktif', 1);
            }])->find($idUser);
    }
    public function mount()
    {
        $this->data = User::role('murid')
             ->with(['murid.semester' => function($query) {
                 $query->select('murid_id', 'status_aktif', 'jenis_program')
                       ->where('status_aktif', 1);
             }])
             ->where(function($query) {
                 if ($this->search) {
                     $query->where('name', 'like', '%' . $this->search . '%')
                           ->orWhere('email', 'like', '%' . $this->search . '%');
                 }
             })
             ->get();
    }

    public function updatedSearch()
    {
        $this->mount();
    }
    public function render()
    {
        return view('livewire.admin.data-murid-baru')->extends('layouts.admin.app');
    }
}
