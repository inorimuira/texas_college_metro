<?php

namespace App\Livewire\Admin;

use App\Models\Pendaftaran as ModelsPendaftaran;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Pendaftaran extends Component
{
    public $data, $search = '', $selectedStudent, $showPopupMata = false;

    public function selectStudent(ModelsPendaftaran $id)
    {
        $this->selectedStudent = $id;
        $this->showPopupMata = true;
    }

    public function validateAccount(ModelsPendaftaran $id){
        $murid = User::create([
            'name' => $id->nama_lengkap,
            'username' => $id->username,
            'email' => $id->email,
            'password' => Hash::make($id->password),
        ]);

        $murid->assignRole('murid');

        

    }

    public function render()
    {
        $this->data = ModelsPendaftaran::where('nama_lengkap', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->get();
        return view('livewire.admin.pendaftaran')->extends('layouts.admin.app');
    }
}
