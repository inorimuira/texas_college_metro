<?php

namespace App\Livewire\Admin;

use App\Models\HeaderUtama;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class LandingPage extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $id, $judul_utama, $sub_judul, $gambar_utama, $gambar;
    public $idReview, $nama_murid, $grade_murid, $review_murid;

    public function mount()
    {
        $headerUtama = HeaderUtama::first();
        if($headerUtama != null) {
            $this->id = $headerUtama->id;
            $this->judul_utama = $headerUtama->title;
            $this->sub_judul = $headerUtama->subtitle;
            $this->gambar = $headerUtama->image;
        }

        // $review = Review::all();
        // if($review != null) {
        //     $this->id = $review->idReview;
        //     $this->nama_murid = $review->nama;
        //     $this->grade_murid = $review->grade;
        //     $this->review_murid = $review->review;
        // }
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

    public function tambahReview()
    {
        $this->validate([
            'nama_murid' => 'required|max:255',
            'grade_murid' => 'required|max:50',
            'review_murid' => 'required',
        ]);

        $review = new Review();

        $review->nama = $this->nama_murid;
        $review->grade = $this->grade_murid;
        $review->review = $this->review_murid;
        
        $review->save();
        
        $this->reset('nama_murid', 'grade_murid', 'review_murid');

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
