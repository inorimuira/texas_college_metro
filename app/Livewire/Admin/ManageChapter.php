<?php

namespace App\Livewire\Admin;

use App\Models\ActivityModule;
use App\Models\Chapter;
use App\Models\Module;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ManageChapter extends Component
{
    use LivewireAlert;
    public $chapter_name, $module_name, $selectedModule, $id_chapter, $isPopupOpenChapter = false, $isPopupOpenModule = false, $isManagingModule = false, $isPopupEditSummary=false, $isPopupOpenActivity = false;
    public $summary, $type, $judul_video, $link_video, $judul_reading, $text, $id, $identity;
    protected $listeners = ['deleteConfirmed' => 'handleConfirm'];

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
        $module->chapter_id = $this->id_chapter;
        $module->nama_module = $this->module_name;
        $module->save();

        $this->reset(['module_name', 'id_chapter']);

        $this->alert('success', 'Modul berhasil ditambahkan');
        $this->isPopupOpenModule = false;
    }

    public function manageModule(Module $selectedModule){
        $this->selectedModule = $selectedModule;
        $this->isManagingModule = true;
    }

    public function clearSelectedModule(){
        $this->selectedModule = null;
        $this->isManagingModule = false;
    }

    public function modalOpenModule($idChapter){
        $this->id_chapter = $idChapter;
        $this->isPopupOpenModule = true;
    }

    public function editSummary(Module $module){
        $rules = [
            'summary' => 'required|min:3',
        ];
        $messages = [
            '*.required' => ':attribute wajib diisi',
            '*.min' => ':attribute minimal :min karakter',
        ];

        $this->validate($rules, $messages);

        $module->summary = $this->summary;
        $module->save();

        $this->reset(['summary']);
        $this->isPopupEditSummary = false;
        $this->manageModule($module);

        $this->alert('success', 'Summary berhasil diubah');
    }
    public function tambahActivity($idModule)
    {
        if ($this ->type == 'video') {
            $rules = [
                'type' => 'required',
                'judul_video' => 'required|min:3',
                'link_video' => [
                    'required',
                    'url',
                    function ($attribute, $value, $fail) {
                        $videoId = $this->extractYoutubeId($value);
                        if (!$videoId) {
                            $fail('Link video YouTube tidak valid');
                        }
                    }
                ],
            ];

            $messages = [
                '*.required' => ':attribute wajib diisi',
                '*.min' => ':attribute minimal :min karakter',
                '*.url' => ':attribute harus berupa url',
            ];

            $this->validate($rules, $messages);

            // Ekstrak ID video
            $videoId = $this->extractYoutubeId($this->link_video);

            $activity = new ActivityModule();
            $activity->module_id = $idModule;
            $activity->type = $this->type;
            $activity->judul = $this->judul_video;
            $activity->link = $videoId; // Simpan hanya ID video
            $activity->save();

        } else if ($this->type == 'reading') {
            $rules = [
                'type' => 'required',
                'judul_reading' => 'required|min:3',
                'text' => 'required|min:3',
            ];

            $messages = [
                '*.required' => ':attribute wajib diisi',
                '*.min' => ':attribute minimal :min karakter',
            ];

            $this->validate($rules, $messages);

            $activity = new ActivityModule();
            $activity->module_id = $idModule;
            $activity->type = $this->type;
            $activity->judul = $this->judul_reading;
            $activity->text = $this->text;
            $activity->save();
        }

        $this->reset([
            'type',
            'judul_video',
            'link_video',
            'judul_reading',
            'text',
        ]);

        $this->isPopupOpenActivity = false;

        $this->alert('success', 'Aktivitas berhasil ditambahkan');
    }

    private function extractYoutubeId($url)
    {
        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches);
        return isset($matches[1]) ? $matches[1] : null;
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
        if ($identity == 'chapter') {
            $chapter = Chapter::with('modules.activityModule')->find($id);

            if ($chapter) {
                foreach ($chapter->modules as $module) {
                    $module->activityModule()->delete();
                }
                $chapter->modules()->delete();
                $chapter->delete();
                $this->alert('success', 'Data berhasil dihapus');
            } else {
                $this->alert('error', 'Data tidak ditemukan');
            }
        } else if ($identity == 'modul') {
            $module = Module::with('activityModule')->find($id);

            if ($module) {
                $module->activityModule()->delete();
                $module->delete();
                $this->alert('success', 'Data berhasil dihapus');
            } else {
                $this->alert('error', 'Data tidak ditemukan');
            }
        }else if ($identity == 'aktivitas modul') {
            $activityModule = ActivityModule::find($id);

            if ($activityModule) {
                $activityModule->delete();
                $this->alert('success', 'Data berhasil dihapus');
            } else {
                $this->alert('error', 'Data tidak ditemukan');
            }
        }
    }

    public function render()
    {
        $chapters = Chapter::with(['modules.activityModule'])->get();
        return view('livewire.admin.manage-chapter', [
            'chapters' => $chapters,
            ])->extends('layouts.admin.app');
    }
}
