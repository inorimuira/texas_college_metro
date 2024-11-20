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

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

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
        <div class="flex h-screen">
            <div class="w-64 bg-white shadow-lg">
                <div class="flex gap-2 items-center justify-center mt-3">
                    <img alt="Logo" class="w-10" height="40" src="{{ asset('assets/image/logo.png') }}" />
                    <span class="text-black font-medium text-lg">Texas College Metro</span>
                </div>
                <nav class="mt-6">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 8h18M3 13h18M3 18h18" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.pendaftaran') }}" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V3H8v8H3v8h18v-8h-5z" />
                        </svg>
                        Pendaftaran
                    </a>
                    <a href="#" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m4-4H8" />
                        </svg>
                        Input Soal
                    </a>
                </nav>
            </div>
            @yield('content')

            @isset($slot)
                {{ $slot }}
            @endisset
            </div>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
    </body>
</html>
