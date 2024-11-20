<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\Test;
use Illuminate\Support\Facades\Route;
use App\Livewire\Client\LandingPage;
use App\Livewire\Client\PilihProgram;
use App\Livewire\Client\IsiBiodataKelasReguler;
use App\Livewire\Client\IsiBiodataKelasUnggulan;
use App\Livewire\Client\Pembayaran;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Pendaftaran;
use App\Livewire\Admin\InputSoal;
use App\Livewire\Admin\TambahSoal;
use App\Livewire\Admin\ManageChapter;
use App\Livewire\Admin\ManageModul;
use App\Livewire\Murid\Dashboard as DashboardMurid;
use App\Livewire\Murid\PlacementTest;
use App\Livewire\Murid\Course;
use App\Livewire\Murid\CourseModule;
use App\Livewire\Murid\CoursePostTest;
use App\Livewire\Murid\CourseVideo;
use App\Livewire\Murid\CourseReading;
use App\Livewire\Murid\PostTest;
use App\Livewire\Murid\Report;


Route::get('/', LandingPage::class)
        ->name('landingpage');

Route::get('/pilihprogram', PilihProgram::class)
        ->name('pilihprogram');

Route::get('/isibiodata/KelasReguler', IsiBiodataKelasReguler::class)
->name('IsiBiodata.KelasReguler');

Route::get('/isibiodata/KelasUnggulan', IsiBiodataKelasUnggulan::class)
->name('IsiBiodata.KelasUnggulan');

// Route::get('/pembayaran/{program}/{id}', Pembayaran::class)
//     ->name('Pembayaran');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');
});

Route::middleware('auth')->group(function () {

    Route::middleware(['role:admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', Dashboard::class)
        ->name('dashboard');

        Route::get('/pendaftaran', Pendaftaran::class)
        ->name('pendaftaran');

        Route::get('/manageChapter', ManageChapter::class)
        ->name('manage-chapter');

        Route::get('/manageModul', ManageModul::class)
        ->name('manage-modul');
    });

    Route::middleware(['role:guru'])->name('guru.')->prefix('guru')->group(function () {
        Route::get('/', function () {
            return 'Hallo Guru';
        })->name('dashboard');
    });

    Route::middleware(['role:murid'])->name('murid.')->prefix('murid')->group(function () {
        Route::get('/dashboard', DashboardMurid::class)
        ->name('dashboard');

        Route::get('/placement-test', PlacementTest::class)
        ->name('placement-test');

        Route::get('/course', Course::class)
        ->name('course');

        Route::get('/report', Report::class)
        ->name('report');

        Route::get('/course-module', CourseModule::class)
        ->name('course-module');

        Route::get('/course-module/video', CourseVideo::class)
        ->name('course-module.video');

        Route::get('/course-module/reading', CourseReading::class)
        ->name('course-module.reading');

        Route::get('/course-module/post-test', CoursePostTest::class)
        ->name('course-module.post-test');

        Route::get('/course-module/post-test/PostTest', PostTest::class)
        ->name('course-module.post-test.PostTest');
    });

    Route::get('logout', LogoutController::class)
        ->name('logout');
});
