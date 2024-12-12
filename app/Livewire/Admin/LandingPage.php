<?php

namespace App\Livewire\Admin;

use App\Models\HeaderUtama;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class LandingPage extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $id, $judul_utama, $sub_judul, $gambar_utama, $gambar;
    public function mount()
    {
        $headerUtama = HeaderUtama::first();
        if($headerUtama != null) {
            $this->id = $headerUtama->id;
            $this->judul_utama = $headerUtama->title;
            $this->sub_judul = $headerUtama->subtitle;
            $this->gambar = $headerUtama->image;
        }
    }

    public function ubahHeaderUtama($id = null)
    {
        if($id != null) {
            $headerUtama = HeaderUtama::where('id', $id)->first();

            if($this->gambar_utama != null) {
                if ($this->gambar_utama instanceof \Illuminate\Http\UploadedFile) {
                    $customFileName = 'gambar-utama-'.time() . '.' . $this->gambar_utama->extension();
                    $this->gambar_utama->storeAs('landingPage', $customFileName, 'public');

                    $headerUtama->update([
                        'title' => $this->judul_utama,
                        'subtitle' => $this->sub_judul,
                        'image' => $customFileName,
                    ]);
                }
            } else {
                $headerUtama->update([
                    'title' => $this->judul_utama,
                    'subtitle' => $this->sub_judul,
                ]);
            }
        }

        $this->reset('judul_utama', 'sub_judul', 'gambar_utama');
        $this->clean_tmp();
        $this->mount();

        $this->alert('success', 'Berhasil', [
            'text' => 'Berhasil',
            'timer' => 3000,
            'toast' => true,
        ]);
    }



    public function clean_tmp(){
        $tmp = Storage::files('livewire-tmp');
        foreach($tmp as $t){
            Storage::delete($t);
        }
    }

    public function render()
    {
        return view('livewire.admin.landing-page')->extends('layouts.admin.app');
    }
}
