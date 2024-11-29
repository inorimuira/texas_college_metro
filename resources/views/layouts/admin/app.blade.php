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
            <nav class="mx-2">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <x-icon-admin icon="iconDashboard" fill="#000" class="mr-2"></x-icon-admin>
                    Dashboard
                </a>

                <!-- Landing Page -->
                <a href="{{ route('admin.landing-page') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <x-icon-admin icon="iconLandingPage" fill="#000" class="mr-2"></x-icon-admin>
                    Landing Page
                </a>

                <!-- Pendaftaran -->
                <a href="{{ route('admin.pendaftaran') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <x-icon-admin icon="iconPendaftaran" fill="#000" class="mr-2"></x-icon-admin>
                    Pendaftaran
                </a>

                <!-- Absensi -->
                <a href="{{ route('admin.absensi') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <x-icon-admin icon="iconAbsensi" fill="#000" class="mr-2"></x-icon-admin>
                    Absensi
                </a>

                <!-- Bank Soal -->
                <a href="{{ route('admin.bank-soal') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <x-icon-admin icon="iconBankSoal" fill="#000" class="mr-2"></x-icon-admin>
                    Bank Soal
                </a>

                <!-- Manage Chapter -->
                <a href="{{ route('admin.manage-chapter') }}"
                    class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 hover:text-gray-900 transition rounded-md">
                    <x-icon-admin icon="iconManageChapter" fill="#000" class="mr-2"></x-icon-admin>
                    Manage Chapter
                </a>

                <!-- Logout -->
                <a href="{{ route('logout') }}"
                    class="flex items-center py-3 px-4 text-red-900 font-medium hover:bg-red-200 transition rounded-md">
                    <x-icon-admin icon="iconLogout" fill="#b91c1c" class="mr-2"></x-icon-admin>
                    Logout
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
