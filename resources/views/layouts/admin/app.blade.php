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
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition">
                        <img src="{{ asset('assets/image/dashboardIcon.svg') }}" class="h-5 w-5 mr-2" alt="Edit Pen Icon">
                        Dashboard
                    </a>

                    <!-- Pendaftaran -->
                    <a href="{{ route('admin.pendaftaran') }}" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition">
                        <img src="{{ asset('assets/image/pendaftaranIcon.png') }}" class="h-5 w-5 mr-2" alt="Edit Pen Icon">
                        Pendaftaran
                    </a>

                    <!-- Absensi -->
                    <a href="{{ route('admin.pendaftaran') }}" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition">
                        <img src="{{ asset('assets/image/absensiIcon.png') }}" class="h-5 w-5 mr-2" alt="Edit Pen Icon">
                        Pendaftaran
                    </a>

                    <!-- Bank Soal -->
                    <a href="#" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition">
                        <img src="{{ asset('assets/image/iconbankSoal.png') }}" class="h-5 w-5 mr-2" alt="Edit Pen Icon">
                        Bank Soal
                    </a>

                    <!-- Manage Chapter -->
                    <div class="relative">
                        <a id="manageChapterBtn" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition">
                            <img src="{{ asset('assets/image/chapterIcon.svg') }}" class="h-5 w-5 mr-2" alt="Edit Pen Icon">
                            Course
                        </a>

                        <!-- Sub-menu -->
                        <div id="submenu" class="ml-6">
                            <a id="manageChapterBtn" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition">
                                <img src="{{ asset('assets/image/chapterIcon.svg') }}" class="h-5 w-5 mr-2" alt="Edit Pen Icon">
                                Manage Chapter
                            </a>
                        </div>
                    </div>
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

        <script>
            const manageChapterBtn = document.getElementById('manageChapterBtn');
            const submenu = document.getElementById('submenu');

            manageChapterBtn.addEventListener('click', () => {
                submenu.classList.toggle('hidden');
            });

            // Optional: Close the submenu when clicking outside
            document.addEventListener('click', (event) => {
                if (!manageChapterBtn.contains(event.target) && !submenu.contains(event.target)) {
                    submenu.classList.add('hidden');
                }
            });
        </script>
    </body>
</html>
