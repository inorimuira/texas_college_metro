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
use App\Livewire\Client\Landingpage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::view('/', 'welcome')->name('home');

Route::get('/', LandingPage::class)
        ->name('landingpage');

// Route::middleware('guest')->group(function () {
//     Route::get('login', Login::class)
//         ->name('login');

//     Route::get('register', Register::class)
//         ->name('register');
// });

// Route::middleware('auth')->group(function () {

//     Route::post('logout', LogoutController::class)
//         ->name('logout');
// });
