<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    /** @var string */
    public $login = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'login' => ['required', 'string'],
        'password' => ['required', 'string'],
    ];

    public function authenticate()
    {
        $this->validate();

        // Tentukan apakah login adalah email atau username
        $loginField = filter_var($this->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Cari pengguna berdasarkan field login
        $user = User::where($loginField, $this->login)->first();

        // Periksa apakah pengguna ada
        if (!$user) {
            $this->addError('login', 'Akun tidak ditemukan.');
            return;
        }

        // Periksa status pengguna
        if ($user->status === 0) {
            $this->addError('login', 'Akun Anda saat ini tidak aktif. Silakan hubungi administrator.');
            return;
        }

        // Percobaan autentikasi
        $credentials = [
            $loginField => $this->login,
            'password' => $this->password
        ];

        if (!Auth::attempt($credentials, $this->remember)) {
            $this->addError('login', 'Kombinasi login atau kata sandi salah.');
            return;
        }

        // Alihkan berdasarkan peran pengguna
        return match (true) {
            $user->hasRole('admin') => redirect()->intended(route('admin.dashboard')),
            $user->hasRole('guru') => redirect()->intended(route('guru.dashboard')),
            $user->hasRole('murid') => redirect()->intended(route('murid.dashboard')),
            default => redirect()->intended(route('home'))
        };
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
