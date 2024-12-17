<?php

namespace App\Livewire\Admin;

use App\Models\Angsuran;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class PembayaranAngsuran extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $data, $tagihan, $tagihanId, $userId, $jenisPembayaran, $nomor_rekening_pengirim, $atas_nama_pengirim, $nominal, $bukti_bayar;
    public $isPreviewMurid = false;

    public function mount()
    {
        $this->data = User::whereHas('murid.tagihan', function ($query) {
            $query->where('status_tagihan', 'Belum Lunas');
        })
        ->with(['murid.tagihan' => function ($query) {
            $query->where('status_tagihan', 'Belum Lunas')
                  ->with('angsuran');
        }])
        ->get();
    }

    public function detailTagihan($tagihanId, $userId)
    {
        $this->tagihanId = $tagihanId;
        $this->userId = $userId;
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
    public function simpanAngsuran($tagihanId, $userId)
    {
        $tagihan = Tagihan::with('angsuran')->find($tagihanId);
        $murid = User::where('id', $userId)
            ->with('murid')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'murid');
            })
            ->first();

        $program = null;

        if($murid->murid->jadwal == null && $murid->murid->keperluan_khusus != null){
            $program = "Unggulan";
        }else if($murid->murid->jadwal != null && $murid->murid->keperluan_khusus == null){
            $program = "Reguler";
        }

        if($tagihan != null){
            if($this->jenisPembayaran == "Non Tunai"){
                $rules = [
                    'jenisPembayaran' => 'required',
                    'nomor_rekening_pengirim' => 'required|numeric|min:10',
                    'atas_nama_pengirim' => 'required|min:3|max:255',
                    'nominal' => 'required|numeric|min:0',
                    'bukti_bayar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                ];

                $messages = [
                    '*.required' => ':attribute wajib diisi',
                    '*.min' => ':attribute minimal :min karakter',
                    '*.max' => ':attribute maksimal :max karakter',
                    '*.numeric' => ':attribute harus berupa angka',
                ];

                $this->validate($rules, $messages);

            }else{
                $rules = [
                    'jenisPembayaran' => 'required',
                    'nominal' => 'required|numeric|min:0',
                    'bukti_bayar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                ];

                $messages = [
                    '*.required' => ':attribute wajib diisi',
                    '*.min' => ':attribute minimal :min karakter',
                    '*.max' => ':attribute maksimal :max karakter',
                    '*.numeric' => ':attribute harus berupa angka',
                ];

                $this->validate($rules, $messages);

                $folderPath = $program === "Reguler"
                    ? 'angsuran/reguler/'
                    : 'angsuran/unggulan/';

                $customFileName = str_replace(' ', '-', strtolower($murid->name))
                    . '-' . time()
                    . '-bukti-pembayaran.' . $this->bukti_bayar->extension();

                $this->bukti_bayar->storeAs($folderPath, $customFileName, 'public');

                $angsuran = new Angsuran();
                $angsuran->tagihan_id = $tagihanId;
                $angsuran->jenis_pembayaran = $this->jenisPembayaran;
                $angsuran->nominal = $this->nominal;
                $angsuran->bukti_bayar = $customFileName;
                $angsuran->save();

                $totalAngsuran = Angsuran::where('tagihan_id', $tagihanId)->sum('nominal');

                if ($totalAngsuran == $tagihan->total_tagihan) {
                    $tagihan->status_tagihan = "Lunas";
                    $tagihan->save();
                }

                $this->clean_tmp();
                $this->alert('success', 'Data berhasil disimpan');
                $this->reset([
                    'jenisPembayaran',
                    'nominal',
                    'bukti_bayar',
                    'tagihanId',
                    'userId',
                ]);
            }
        }
    }

    public function clean_tmp(){
        $tmp = Storage::files('livewire-tmp');
        foreach($tmp as $t){
            Storage::delete($t);
        }
    }

    public function render()
    {
        return view('livewire.admin.pembayaran-angsuran')->extends('layouts.admin.app');
    }
}
