<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DetailKelas extends Component
{
    use LivewireAlert;

    public $id_user, $idKelas, $search = '', $filter = '', $data, $muridKelas, $selectedUsers = [];
    public $isTambahMurid = false, $listeners = ['deleteConfirmed' => 'handleConfirm'];

    public function mount($idKelas)
    {
        $this->muridKelas = User::role('murid')
            ->whereHas('kelas', function ($query) use ($idKelas) {
                $query->where('kelas.id', $idKelas);
            })
            ->with(['murid' => function ($query) {
                $query->select('id', 'user_id', 'tingkat_pemahaman')
                    ->whereNotNull('tingkat_pemahaman');
            }])
            ->get(['id', 'name']);
    }


    public function tambahMurid($idKelas)
    {
        foreach ($this->selectedUsers as $selectedUser) {
            $user = User::find($selectedUser);
            $user->kelas()->sync($idKelas);
        }

        $this->isTambahMurid = false;
        $this->reset([
            'search',
            'filter',
            'selectedUsers',
        ]);

        $this->mount($this->idKelas);

        $this->alert('success', 'Murid berhasil ditambahkan');
    }

    public function closeTambahMurid()
    {
        $this->isTambahMurid = false;
        $this->reset([
            'search',
            'filter',
        ]);
    }

    public function toggleSelectAll()
    {
        if (count($this->selectedUsers) === $this->data->count()) {
            $this->selectedUsers = [];
        } else {
            $this->selectedUsers = $this->data->pluck('id')->toArray();
        }
    }


    public function confirmDelete($idUser)
    {
        $this->id_user = $idUser;
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
        if ($this->id_user) {
            $this->deletePermission($this->id_user);
        }
    }

    public function deletePermission($id_user)
    {
        $user = User::find($id_user);

        if ($user) {
            $user->kelas()->detach();
            $this->alert('success', 'data berhasil dihapus.');
            $this->mount($this->idKelas);
        } else {
            $this->alert('error', 'data tidak ditemukan.');
        }
    }

    public function render()
    {
        $this->data = User::role('murid')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%$this->search%");
            })
            ->when($this->filter, function ($query) {
                $query->whereHas('murid', function ($query) {
                    $query->where('tingkat_pemahaman', $this->filter);
                });
            })
            ->doesntHave('kelas')
            ->whereHas('murid', function ($query) {
                $query->whereNotNull('tingkat_pemahaman');
            })
            ->select('id', 'name')
            ->with(['murid' => function ($query) {
                $query->select('user_id', 'tingkat_pemahaman');
            }])
            ->get();

        return view('livewire.admin.detail-kelas')->extends('layouts.admin.app');
    }
}
