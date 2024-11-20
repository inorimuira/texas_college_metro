<?php

namespace App\Livewire\Admin;

use App\Mail\ValidationInfoMail;
use App\Models\Angsuran;
use App\Models\Murid;
use App\Models\Pendaftaran as ModelsPendaftaran;
use App\Models\Semester;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Pendaftaran extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'tailwind', $listeners = ['deleteConfirmed' => 'handleConfirm'];

    public $search = '',
           $selectedStudent,
           $showPopupInfo = false,
           $id_pendaftaran = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function selectStudent(ModelsPendaftaran $id)
    {
        $this->selectedStudent = $id;
        $this->showPopupInfo = true;
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
        $pendaftaranQuery = ModelsPendaftaran::where('nama_lengkap', 'like', '%' . $this->search . '%')
            ->orderBy('status', 'asc')
            ->paginate(15); // Mengatur pagination ke 2

        return view('livewire.admin.pendaftaran', [
            'data' => $pendaftaranQuery
        ])->extends('layouts.admin.app');
    }
}
