<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf; // Pastikan Dompdf sudah diinstal dan diimport
use Illuminate\Support\Facades\Storage;

class Sertifikat extends Component
{
    public $nama;
    public $tempatLahir;
    public $tanggalLahir;
    public $indexSertifikat;
    public $gradeMurid;
    public $tanggalGenerate;

    public function render()
    {
        return view('livewire.admin.sertifikat')->extends('layouts.admin.app');
    }

    public function generateCertificate()
    {
        // Validasi input
        $this->validate([
            'nama' => 'required|string|max:255',
            'tempatLahir' => 'required|string|max:255',
            'tanggalLahir' => 'required|date',
            'indexSertifikat' => 'required|string|max:255',
            'gradeMurid' => 'required|string|max:255',
            'tanggalGenerate' => 'required|date',
        ]);

        // Load PDF dengan variabel
        $pdf = Pdf::loadView('layouts.sertifikat', [
            'nama' => $this->nama,
            'tempatLahir' => $this->tempatLahir,
            'tanggalLahir' => $this->tanggalLahir,
            'indexSertifikat' => $this->indexSertifikat,
            'gradeMurid' => $this->gradeMurid,
            'tanggalGenerate' => $this->tanggalGenerate,
        ]);

        // Download PDF
        return response()->streamDownload(
            fn () => print($pdf->output()),
            "certificate-{$this->nama}.pdf"
        );
    }
}
