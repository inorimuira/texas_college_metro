<?php

namespace App\Livewire\Admin;

use App\Models\MuridLama;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DataMuridLama extends Component
{
    use LivewireAlert;
    public $data, $muridPreview, $idMuridLama, $isPreviewMurid, $search = '';
    protected $listeners = ['deleteConfirmed' => 'handleConfirm'];

    public function mount()
    {
        $this->data = MuridLama::where('nama', 'like', '%' . $this->search . '%')->get();
    }

    public function updatedSearch()
    {
        $this->mount();
    }

    public function selectStudent($idmuridLama)
    {
        $this->isPreviewMurid = true;
        $this->muridPreview = MuridLama::where('id', $idmuridLama)->find($idmuridLama);
    }

    public function confirmDelete($idMuridLama)
    {
        $this->idMuridLama = $idMuridLama;
        $this->alert('warning', 'Apakah Anda yakin ingin menghapus data ini?', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ya, Hapus',
            'showCancelButton' => true,
            'cancelButtonText' => 'Batal',
            'onConfirmed' => 'deleteConfirmed',
            'timer' => null,
        ]);
    }

    public function handleConfirm()
    {
        if ($this->idMuridLama) {
            $this->deletePermission($this->idMuridLama);
        }
    }

    public function deletePermission($idMuridLama)
    {
        $muridLama = MuridLama::find($idMuridLama);

        if (!$muridLama) {
            $this->alert('error', 'Data tidak ditemukan.');
            return;
        }

        $muridLama->delete();

        $this->alert('success', 'Data berhasil dihapus.');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.data-murid-lama')->extends('layouts.admin.app');
    }
}
