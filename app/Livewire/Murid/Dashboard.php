<?php

namespace App\Livewire\Murid;

use App\Models\Chapter;
use App\Models\Module;
use App\Models\Presensi;
use App\Models\PresensiRecord;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $firstIncompleteChapter = null, $presensi, $progressPercentage = 0, $chapterId, $attandance = false, $isAttendanceOpen = false;

    public function mount()
    {
        $this->findFirstIncompleteChapter();
        $idKelas = Auth::user()->kelas()->pluck('kelas.id')->first();
        $this->presensiAktif($idKelas);
    }

    public function markAttendance($presensiId, $moduleId)
    {
        $presensiRecord =  new PresensiRecord();
        $presensiRecord->presensi_id = $presensiId;
        $presensiRecord->user_id = Auth::id();
        $presensiRecord->module_id = $moduleId;
        $presensiRecord->status = true;
        $presensiRecord->save();

        $this->isAttendanceOpen = true;
    }

    protected function presensiAktif($idKelas)
    {
        $this->presensi = Presensi::where('kelas_id', $idKelas)
            ->where('status', 1)
            ->where('waktu_tutup', '>', now())
            ->with(['module:id,nama_module'])
            ->first();

        if ($this->presensi) {
            $attandance = PresensiRecord::where('user_id', Auth::id())
                ->where('presensi_id', $this->presensi->id)
                ->first();

            if ($attandance == null) {
                $this->attandance = true;
            }else{
                $this->attandance = false;
            }
        }
    }

    protected function calculateProgress($chapterId)
    {
        $userId = Auth::id();

        $totalModules = Module::where('chapter_id', $chapterId)->count();

        $completedModules = Module::whereHas('recordCourse', function($query) use ($userId, $chapterId) {
            $query->where('user_id', $userId)
                  ->where('chapter_id', $chapterId)
                  ->where('status', true);
        })->count();

        $this->progressPercentage = $totalModules > 0
            ? intval(round(($completedModules / $totalModules) * 100))
            : 0;
    }


    protected function findFirstIncompleteChapter()
    {
        $this->firstIncompleteChapter = Chapter::whereHas('modules', function($query) {
            $query->whereDoesntHave('recordCourse', function($subQuery) {
                $subQuery->where('user_id', Auth::id())
                         ->where('status', true);
            });
        })
        ->with(['modules' => function($query) {
            $query->with(['activityModule', 'recordCourse'])
                  ->whereDoesntHave('recordCourse', function($subQuery) {
                      $subQuery->where('user_id', Auth::id())
                               ->where('status', true);
                  });
        }])
        ->first();

        $this->chapterId = $this->firstIncompleteChapter ? $this->firstIncompleteChapter->id : null;

        $this->calculateProgress($this->chapterId);
    }

    public function render()
    {
        return view('livewire.murid.dashboard', [
            'chapters' => $this->firstIncompleteChapter,
            'percentage' => round($this->progressPercentage),
            'presensi' => $this->presensi,
        ])->extends('layouts.murid.app');
    }
}
