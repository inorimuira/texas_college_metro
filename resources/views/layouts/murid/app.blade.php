<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('assets/image/logo.png')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        ::selection {
            background-color: #d3d3ff;
            /* Warna Emerald-400 */
            color: #2b2b73;
            /* Warna teks saat di-highlight */
        }
    </style>
</head>

<body>
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
</body>

</html>
