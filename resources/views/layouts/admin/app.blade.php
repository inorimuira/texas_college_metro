<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div class="bg-gray-100 font-sans antialiased">
    <!-- Sidebar -->
    <div class="flex h-full min-h-screen">
        <div class="bg-white shadow-lg flex flex-col gap-6">
            <div class="flex gap-2 items-center justify-center py-4 mx-2 border-b">
                <img alt="Logo" class="w-10" height="40" src="{{ asset('assets/image/logo.png') }}" />
                <span class="text-black font-medium text-lg">Texas College Metro</span>
            </div>
            <nav class="mx-2 space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <img src="{{ asset('assets/image/dashboardIcon.svg') }}" class="h-5 w-5 mr-2" alt="Edit Pen Icon">
                    Dashboard
                </a>

                <!-- Landing Page tanpa Submenu -->
                <a href="{{ route('admin.landing-page') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <img src="{{ asset('assets/image/landingpageIcon.svg') }}" class="h-5 w-5 mr-2" alt="Edit Pen Icon">
                    Landing Page
                </a>

                <!-- Landing Page dengan Submenu -->
                {{-- <div x-data="{ openSubmenu: false }" class="space-y-1">
                    <button @click="openSubmenu = !openSubmenu"
                        class="flex justify-between items-center w-full py-3 px-4 text-gray-700 font-medium focus:bg-gray-300 hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/image/landingpageIcon.svg') }}" class="h-5 w-5 mr-2" alt="Landing Page Icon">
                            Landing Page
                        </div>
                        <svg :class="{'transform rotate-180': openSubmenu}" class="w-5 h-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openSubmenu" class="w-full bg-gray-300 rounded-md">
                        <a href="{{ route('admin.landing-page') }}"
                            class="w-full pl-12 block py-2 px-4 text-gray-600 hover:bg-gray-400 hover:text-gray-900 transition rounded-md">
                            Navigasi & Header
                        </a>
                        <a href="{{ route('admin.landing-page') }}"
                            class="w-full pl-12 block py-2 px-4 text-gray-600 hover:bg-gray-400 hover:text-gray-900 transition rounded-md">
                            Review
                        </a>
                        <a href="{{ route('admin.landing-page') }}"
                            class="w-full pl-12 block py-2 px-4 text-gray-600 hover:bg-gray-400 hover:text-gray-900 transition rounded-md">
                            Program Kami
                        </a>
                        <a href="{{ route('admin.landing-page') }}"
                            class="w-full pl-12 block py-2 px-4 text-gray-600 hover:bg-gray-400 hover:text-gray-900 transition rounded-md">
                            Kontak
                        </a>
                    </div>
                </div> --}}

                <!-- Pendaftaran -->
                <a href="{{ route('admin.pendaftaran') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <img src="{{ asset('assets/image/pendaftaranIcon.png') }}" class="h-5 w-5 mr-2"
                        alt="Edit Pen Icon">
                    Pendaftaran
                </a>

                <!-- Absensi -->
                <a href="{{ route('admin.absensi') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <img src="{{ asset('assets/image/absensiIcon.png') }}" class="h-5 w-5 mr-2" alt="Edit Pen Icon">
                    Absensi
                </a>

                <!-- Bank Soal -->
                <a href="{{ route('admin.bank-soal') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <img src="{{ asset('assets/image/iconbankSoal.png') }}" class="h-5 w-5 mr-2" alt="Edit Pen Icon">
                    Bank Soal
                </a>

                <!-- Manage Chapter -->
                <a href="{{ route('admin.manage-chapter') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <img src="{{ asset('assets/image/chapterIcon.svg') }}" class="h-5 w-5 mr-2" alt="Edit Pen Icon">
                    Manage Chapter
                </a>
            </nav>
        </div>
        <div class="flex flex-col w-full">
            <x-admin.navbar></x-admin.navbar>
            @yield('content')
        </div>

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />
</body>

</html>
