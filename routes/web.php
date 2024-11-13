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

Route::get('/', LandingPage::class)
        ->name('landingpage');

Route::get('/pilihprogram', PilihProgram::class)
        ->name('pilihprogram');

Route::get('/isibiodata/KelasReguler', IsiBiodataKelasReguler::class)
->name('IsiBiodata.KelasReguler');

Route::get('/isibiodata/KelasUnggulan', IsiBiodataKelasUnggulan::class)
->name('IsiBiodata.KelasUnggulan');

Route::get('/admin/dashboard', Dashboard::class)
->name('Dashboard');

Route::get('/admin/pendaftaran', Pendaftaran::class)
->name('Pendaftaran');


Route::get('/pembayaran/{program}/{id}', Pembayaran::class)
    ->name('Pembayaran');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');
});

Route::middleware('auth')->group(function () {

    Route::middleware(['role:admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/', function () {
            return 'Hallo Admin';
        })->name('dashboard');
    });

    Route::middleware(['role:guru'])->name('guru.')->prefix('guru')->group(function () {
        Route::get('/', function () {
            return 'Hallo Guru';
        })->name('dashboard');
    });

    Route::middleware(['role:murid'])->name('murid.')->prefix('murid')->group(function () {
        Route::get('/', function () {
            return 'Hallo Murid';
        })->name('dashboard');
    });

    Route::get('logout', LogoutController::class)
        ->name('logout');
});
