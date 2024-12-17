<?php

namespace App\Livewire\Admin;

use App\Models\BankSoal as ModelsBankSoal;
use App\Models\Chapter;
use App\Models\Module;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class BankSoal extends Component
{
    use LivewireAlert;
    public $selectedModule, $question, $optionA, $optionB, $optionC, $optionD, $answerCorrect, $id, $identity;
    public $isTambahSoal = false, $isModuleOpen = false;
    protected $listeners = ['deleteConfirmed' => 'handleConfirm'];


    public function selectModule(Module $selectedModule){
        $this->selectedModule = $selectedModule;
        $this->isModuleOpen = true;
    }

    public function clearSelectedModule(){
        $this->selectedModule = null;
        $this->isModuleOpen = false;
    }
    public function tambahSoal($idmodule){
        $module = Module::find($idmodule);
        if ($module) {
            $bankSoal = new ModelsBankSoal();
            $bankSoal->module_id = $idmodule;
            $bankSoal->question = $this->question;
            $bankSoal->a = $this->optionA;
            $bankSoal->b = $this->optionB;
            $bankSoal->c = $this->optionC;
            $bankSoal->d = $this->optionD;
            if($this->answerCorrect == 'a'){
                $bankSoal->answer = $this->optionA;
            }elseif($this->answerCorrect == 'b'){
                $bankSoal->answer = $this->optionB;
            }elseif($this->answerCorrect == 'c'){
                $bankSoal->answer = $this->optionC;
            }elseif($this->answerCorrect == 'd'){
                $bankSoal->answer = $this->optionD;
            }
            $bankSoal->save();

            $this->reset(['question', 'optionA', 'optionB', 'optionC', 'optionD', 'answerCorrect']);
            $this->isTambahSoal = false;
            $this->alert('success', 'Soal berhasil ditambahkan');
        }else{
            $this->alertDataNotFound();
            $this->isTambahSoal = false;
        }
    }

    public function confirmDelete($id, $identity)
    {
        $this->id = $id;
        $this->identity = $identity;
        $this->alert('warning', 'Apakah Anda yakin ingin menghapus data '.$identity.' ini? semua data yang terkait juga akan ikut terhapus!', [
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
        if ($this->id) {
            $this->deleteData($this->id, $this->identity);
        }
    }

    public function deleteData($id, $identity)
    {
        if ($identity == 'Semua Soal') {
            $module = Module::with('bankSoals')->find($id);

            if ($module) {
                $module->bankSoals()->delete();
                $this->alert('success', 'Data berhasil dihapus');
            } else {
                $this->alertDataNotFound();
            }
        } else if ($identity == 'Soal') {
            $bankSoal = ModelsBankSoal::find($id);

            if ($bankSoal) {
                $bankSoal->delete();
                $this->alert('success', 'Data berhasil dihapus');
            } else {
                $this->alertDataNotFound();
            }
        }
    }

    public function alertDataNotFound(){
        $this->alert('warning', 'Data tidak ditemukan!', [
            'position' => 'center',
            'toast' => false,
            'timer' => 3000,
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        $chapters = Chapter::with(['modules.bankSoals'])->get();
        return view('livewire.admin.bank-soal', [
            'chapters' => $chapters,
            ])->extends('layouts.admin.app');
    }
}
