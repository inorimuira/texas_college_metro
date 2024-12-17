<?php

namespace App\Livewire\Admin;

use App\Models\Tagihan;
use App\Models\User;
use Livewire\Component;

class PembayaranLunas extends Component
{
    public $data, $tagihan;
    public $isPreviewMurid = false;

    public function mount()
    {
        $this->data = User::whereHas('murid.tagihan', function ($query) {
            $query->where('status_tagihan', 'Lunas');
        })
        ->with(['murid.tagihan' => function ($query) {
            $query->where('status_tagihan', 'Lunas')
                  ->with('angsuran');
        }])
        ->get();
    }

    public function detailTagihan($tagihanId)
    {
        $this->isPreviewMurid = true;
        $this->tagihan = Tagihan::where('id', $tagihanId)
            ->with([
                'angsuran',
                'murid' => function ($query) {
                    $query->select('id', 'jadwal', 'keperluan_khusus');
                }
            ])
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.pembayaran-lunas')->extends('layouts.admin.app');
    }
}
