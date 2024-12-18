<?php

namespace App\Livewire\Admin;

use App\Models\certificate;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf; // Pastikan Dompdf sudah diinstal dan diimport
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Sertifikat extends Component
{
    use LivewireAlert;

    public $data, $idSertifikat, $nama, $tempatLahir, $tanggalLahir, $indexSertifikat, $gradeMurid, $tanggalGenerate, $predikatMurid, $search = '', $pdfPreviewUrl = '';
    public $isGenerateSertifikat = false, $isPreviewMurid = false;
    protected $listeners = ['deleteConfirmed' => 'handleConfirm'];

    public function mount()
    {
        $this->data = certificate::where('nama', 'like', '%' . $this->search . '%')->get();
    }

    public function updatedSearch()
    {
        $this->mount();
    }

    public function generateCertificate()
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'tempatLahir' => 'required|string|max:255',
            'tanggalLahir' => 'required|date',
            'indexSertifikat' => 'required|string|max:255',
            'gradeMurid' => 'required|string|max:255',
            'predikatMurid' => 'required|string|max:255',
            'tanggalGenerate' => 'required|date',
        ];

        $message = [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
        ];

        $this->validate($rules, $message);

        $generatedCertificate = new certificate();
        $generatedCertificate->nama = $this->nama;
        $generatedCertificate->tempat_lahir = $this->tempatLahir;
        $generatedCertificate->tgl_lahir = $this->tanggalLahir;
        $generatedCertificate->index_number = $this->indexSertifikat;
        $generatedCertificate->grade = $this->gradeMurid;
        $generatedCertificate->predikat = $this->predikatMurid;
        $generatedCertificate->tgl_generate = $this->tanggalGenerate;
        $generatedCertificate->save();

        $this->reset([
            'nama',
            'tempatLahir',
            'tanggalLahir',
            'indexSertifikat',
            'gradeMurid',
            'predikatMurid',
            'tanggalGenerate',
        ]);

        $this->alert('success', 'Sertifikat berhasil dihasilkan.');
        $this->isGenerateSertifikat = false;
        $this->mount();
    }

    public function downloadCertificate()
    {
        $pdf = Pdf::loadView('layouts.sertifikat', [
            'nama' => $this->nama,
            'tempatLahir' => $this->tempatLahir,
            'tanggalLahir' => $this->tanggalLahir,
            'indexSertifikat' => $this->indexSertifikat,
            'gradeMurid' => $this->gradeMurid,
            'predikatMurid' => $this->predikatMurid,
            'tanggalGenerate' => $this->tanggalGenerate,
        ]);

        return response()->streamDownload(
            fn () => print($pdf->output()),
            "certificate-{$this->nama}.pdf"
        );
    }

    public function confirmDelete($idSertifikat)
    {
        $this->idSertifikat = $idSertifikat;
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
        if ($this->idSertifikat) {
            $this->deletePermission($this->idSertifikat);
        }
    }

    public function deletePermission($idSertifikat)
    {
        $sertifikat = certificate::find($idSertifikat);

        if (!$sertifikat) {
            $this->alert('error', 'Data tidak ditemukan.');
            return;
        }

        $sertifikat->delete();

        $this->alert('success', 'Data berhasil dihapus.');
        $this->mount();
    }

    public function previewCertificate($id)
    {
        $certificate = certificate::findOrFail($id);

        $pdf = Pdf::loadView('layouts.sertifikat', [
            'nama' => $certificate->nama,
            'tempatLahir' => $certificate->tempat_lahir,
            'tanggalLahir' => $certificate->tgl_lahir,
            'indexSertifikat' => $certificate->index_number,
            'gradeMurid' => $certificate->grade,
            'predikatMurid' => $certificate->predikat,
            'tanggalGenerate' => $certificate->tgl_generate,
        ]);

        $fileName = "certificate-preview-{$certificate->nama}.pdf";
        $filePath = "certificates/{$fileName}";

        Storage::put("public/{$filePath}", $pdf->output());

        return asset("storage/{$filePath}");
    }

    public function showPreview($id)
    {
        $this->pdfPreviewUrl = $this->previewCertificate($id);
        $this->isPreviewMurid = true;
    }

    public function closePreview()
    {
        $this->pdfPreviewUrl = '';
        $this->isPreviewMurid = false;
        $this->cleanCertificates();
    }

    public function cleanCertificates()
    {
        $files = Storage::files('public/certificates');
        foreach ($files as $file) {
            Storage::delete($file);
        }
    }


    public function render()
    {
        return view('livewire.admin.sertifikat')->extends('layouts.admin.app');
    }
}
