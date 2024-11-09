<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $login = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'login' => ['required'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        // dd($this->login);
        $this->validate();

        // Tentukan apakah login adalah email atau username
        $credentials = filter_var($this->login, FILTER_VALIDATE_EMAIL) ?
            ['email' => $this->login, 'password' => $this->password] :
            ['username' => $this->login, 'password' => $this->password];

        if (!Auth::attempt($credentials, $this->remember)) {
            $this->addError('login', trans('auth.failed'));
            return;
        }

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->intended(route('admin.dashboard'));
        }

        if ($user->hasRole('guru')) {
            return redirect()->intended(route('guru.dashboard'));
        }

        if ($user->hasRole('murid')) {
            return redirect()->intended(route('murid.dashboard'));
        }
        // return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
