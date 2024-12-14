<?php

namespace App\Livewire\Murid;

use App\Models\BankSoal;
use App\Models\Module;
use Livewire\Component;

class PostTest extends Component
{
    public $modules, $moduleIds, $pilihan = [], $jawabanSoal = [];
    public $isSimpanJawaban = false, $isModalOpen = false, $errors = [];

    public function mount($moduleId)
    {
        $this->moduleIds = $moduleId;
        $this->modules = Module::with(['bankSoals', 'chapter'])->where('id', $moduleId)->get();
        $this->prepareNomorSoalMapping();
    }

    protected function prepareNomorSoalMapping()
    {
        $nomorSoal = 1;
        foreach ($this->modules as $module) {
            foreach ($module->bankSoals as $bankSoal) {
                $this->jawabanSoal[$nomorSoal] = [
                    'id_bank_soal' => $bankSoal->id,
                    'jawaban' => null
                ];
                $this->pilihan[$nomorSoal] = null; // Inisialisasi pilihan
                $nomorSoal++;
            }
        }
    }

    public function rulesMessages()
    {
        $rules = [
            'pilihan.*' => 'required'
        ];

        $message = [
            'pilihan.*.required' => 'Jawaban harus diisi'
        ];

        $this->validate($rules, $message);
    }

    public function submit()
    {
        try {
            $this->rulesMessages();

            foreach ($this->jawabanSoal as $nomorSoal => $data) {
                $data['jawaban'] = $this->pilihan[$nomorSoal];
                $this->jawabanSoal[$nomorSoal] = $data;
            }

            $jawabanBenar = 0;
            $totalSoal = count($this->jawabanSoal);

            foreach ($this->jawabanSoal as $nomorSoal => $data) {
                $data['jawaban'] = $this->pilihan[$nomorSoal];
                $bankSoal = BankSoal::find($data['id_bank_soal']);
                if ($bankSoal->answer == $data['jawaban']) {
                    $jawabanBenar++;
                }
            }

            $nilaiAkhir = round(($jawabanBenar / $totalSoal) * 100);
            $recordCourse = auth()->user()->recordCourse()->create([
                'user_id' => auth()->user()->id,
                'module_id' => $this->moduleIds[0],
                'status' => true,
                'score' => $nilaiAkhir
            ]);

            // $this->setTiangkatPemahaman($nilaiAkhir);

            $this->isModalOpen = false;
            $this->isSimpanJawaban = true;

        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->isModalOpen = false;
            $this->isSimpanJawaban = false;
            $this->errors = $e->validator->errors()->toArray();
        }
    }

    // public function setTiangkatPemahaman($nilaiAkhir){
    //     $tingkatPemahaman = null;

    //     if($nilaiAkhir < 50){
    //         if(auth()->user()->murid->tingkat_pendidikan == "SD"){
    //             $tingkatPemahaman = 'children';
    //         }else{
    //             $tingkatPemahaman = 'beginner 1';
    //         }
    //     }else if($nilaiAkhir < 60){
    //         $tingkatPemahaman = 'beginner 2';
    //     }else if($nilaiAkhir < 70){
    //         $tingkatPemahaman = 'pre-elementary';
    //     }else if($nilaiAkhir < 80){
    //         $tingkatPemahaman = 'elementary';
    //     }else if($nilaiAkhir < 90){
    //         $tingkatPemahaman = 'low intermediate';
    //     }else if($nilaiAkhir <= 100){
    //         $tingkatPemahaman = 'high intermediate';
    //     }

    //     auth()->user()->murid->update([
    //         'tingkat_pemahaman' => $tingkatPemahaman
    //     ]);
    // }

    public function render()
    {
        return view('livewire.murid.post-test')->extends('layouts.murid.app');
    }
}
