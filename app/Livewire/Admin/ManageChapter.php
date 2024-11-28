<?php

namespace App\Livewire\Admin;

use App\Models\Chapter;
use App\Models\Module;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ManageChapter extends Component
{
    use LivewireAlert;
    public $chapter_name, $module_name, $selectedModule, $id_chapter, $isPopupOpenChapter = false, $isPopupOpenModule = false, $isManagingModule = false;

    public function tambahChapter(){
        $rules = [
            'chapter_name' => 'required|min:3',
        ];

        $messages = [
            '*.required' => ':attribute wajib diisi',
            '*.min' => ':attribute minimal :min karakter',
        ];

        $this->validate($rules, $messages);

        $chapter = new Chapter;
        $chapter->nama_chapter = $this->chapter_name;
        $chapter->save();

        $this->reset(['chapter_name']);

        $this->alert('success', 'Chapter berhasil ditambahkan');
        $this->isPopupOpenChapter = false;
    }

    public function tambahModule(){
        $rules = [
            'module_name' => 'required|min:3',
        ];

        $messages = [
            '*.required' => ':attribute wajib diisi',
            '*.min' => ':attribute minimal :min karakter',
        ];

        $this->validate($rules, $messages);

        $module = new Module;
        $module->chapters_id = $this->id_chapter;
        $module->nama_module = $this->module_name;
        $module->save();

        $this->reset(['module_name', 'id_chapter']);

        $this->alert('success', 'Module berhasil ditambahkan');
        $this->isPopupOpenModule = false;
    }

    public function manageModule(Module $selectedModule){
        $this->selectedModule = $selectedModule;
        $this->isManagingModule = true;
    }

    public function modalOpenModule($idChapter){
        $this->id_chapter = $idChapter;
        $this->isPopupOpenModule = true;
    }


    public function render()
    {
        $chapters = Chapter::all();
        $modules = Module::all();
        return view('livewire.admin.manage-chapter', [
            'chapters' => $chapters,
            'modules' => $modules
            ])->extends('layouts.admin.app');
    }
}
