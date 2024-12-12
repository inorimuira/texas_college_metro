<?php

namespace App\Livewire\Client;

use App\Models\HeaderUtama;
use Livewire\Component;

class LandingPage extends Component
{
    public $judul_utama, $sub_judul, $gambar;
    public function mount()
    {
        $header_utama = HeaderUtama::first();
        if($header_utama != null) {
            $this->judul_utama = $header_utama->title;
            $this->sub_judul = $header_utama->subtitle;
            $this->gambar = $header_utama->image;
        }
    }
    public function render()
    {
        return view('livewire.client.landing-page')->extends('layouts.client.app');
    }
}
