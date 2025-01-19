<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Gabung dengan kursus unggulan di Texas College Metro Lampung. Belajar fleksibel, keterampilan masa depan, dan komunitas global. Daftar sekarang!">
    <meta name="author" content="Texas College Metro Lampung">
    <meta name="keywords" content="texas college, kursus texas college, lkp lampung, lkp metro, metro lampung, kursus murah, kursus murah lampung, kursus lampung,, kursus bahasa inggris lampung kursus bahasa inggris, kursus metro lampung">
    <meta name="robots" content="index, follow">

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
            color: #2b2b73;
        }
        .custom-scroll::-webkit-scrollbar {
            display: none;
        }

        .custom-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        #carousel {
            scroll-behavior: smooth;
        }
    </style>
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Organization",
          "name": "Texas College Metro Lampung",
          "url": "https://texascollegemetro.com",
          "logo": "https://texascollegemetro.com/logo.png",
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+6281373670389",
            "contactType": "Customer Service",
            "areaServed": "ID",
            "availableLanguage": "Indonesian"
          },
          "sameAs": [
            "https://www.instagram.com/texascollege_englishcourse"
          ]
        }
    </script>
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
                    carousel.scrollLeft += 900;
                } else {
                    carousel.scrollLeft = 0;
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
