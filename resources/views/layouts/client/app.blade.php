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
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <!-- AOS Animation -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

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
        .custom-scroll::-webkit-scrollbar {
            display: none;
        }

        .custom-scroll {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        #carousel {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset

    <!-- AOS Animation -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('carousel');
            let scrollInterval;

            // Fungsi untuk melakukan scroll otomatis
            function autoScroll() {
                if (carousel.scrollLeft + carousel.offsetWidth < carousel.scrollWidth) {
                    carousel.scrollLeft += 900; // Scroll ke kanan sebanyak 300px
                } else {
                    carousel.scrollLeft = 0; // Kembali ke kiri jika sudah sampai akhir
                }
            }

            // Mulai auto-scroll setiap 3 detik
            scrollInterval = setInterval(autoScroll, 4000);

            // Hentikan scroll otomatis saat hover
            carousel.addEventListener('mouseenter', function() {
                clearInterval(scrollInterval);
            });

            // Mulai scroll otomatis kembali setelah hover
            carousel.addEventListener('mouseleave', function() {
                scrollInterval = setInterval(autoScroll, 3000);
            });
        });
    </script>
</body>

</html>
