<div class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <div class="flex items-center">
                <img alt="Logo" class="rounded-full" height="40"
                    src="{{ asset('assets/image/logo.png') }}"
                    width="40" />
                <span class="ml-3 text-lg font-bold text-blue-600">
                    Texas College Metro
                </span>
            </div>
            <nav class="flex space-x-6 ml-auto mr-6">
                <a href="#program_kami" class="text-gray-600 hover:text-blue-600">
                    Program Kami
                </a>
                <a href="#tentang_kami" class="text-gray-600 hover:text-blue-600">
                    Tentang Kami
                </a>
            </nav>
            <div>
                <button class="text-gray-600">
                    Login
                </button>
            </div>
        </div>
    </header>
    {{-- Hero Section --}}
    <div class="relative md:container md:mx-auto">
        <img alt="Students in graduation attire" class="w-full h-96 object-cover" height="500"
            src="https://storage.googleapis.com/a1aa/image/m8TXsN0qNLrOCh2Bbb1N5uMhwFDb622vcebSWNnKwI1VLg1JA.jpg"
            width="1200" />
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg text-left max-w-lg">
                <h1 class="text-2xl font-bold mb-4">
                    Selamat Datang di Texas College Metro
                </h1>
                <p class="text-gray-700 mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et tortor sit amet massa egestas
                    interdum. Proin laoreet diam, quis justo velit facilisis.
                </p>
                <div class="flex space-x-4">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Belajar Sekarang
                    </button>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Hubungi Kami
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-12 ..."></div>
    {{-- Program Section --}}
    <div id="program_kami" class="program_kami container mx-auto text-center py-16">
        <h2 class="text-3xl font-bold mb-12 text-gray-800">
            PROGRAM KAMI
        </h2>
        <div class="flex justify-center space-x-8">
            <!-- Card Kelas Reguler -->
            <div class="bg-gradient-to-b from-blue-500 to-blue-600 text-white p-10 rounded-xl shadow-2xl w-72 transform hover:scale-105 transition-transform duration-300">
                <h3 class="text-xl font-bold mb-4">
                    Kelas Reguler
                </h3>
                <p class="text-white text-sm mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque aliquam odio et faucibus. Nulla rhoncus feugiat eros quis consectetur.
                </p>
                <button class="bg-white text-black px-4 py-2 rounded-full flex items-center justify-center shadow-md mb-4 hover:bg-gray-100 transition-colors">
                    <img src="{{ asset('assets/image/icon buku.png') }}" alt="lorem ipsum" class="w-5 h-5 mr-2">
                    Lorem Ipsum
                </button>
                <button class="bg-white text-black px-4 py-2 rounded-full flex items-center justify-center shadow-md hover:bg-gray-100 transition-colors">
                    <img src="{{ asset('assets/image/icon lampu.png') }}" alt="lorem ipsum" class="w-5 h-5 mr-2">
                    Lorem Ipsum
                </button>
            </div>

            <!-- Card Kelas Unggulan -->
            <div class="bg-gradient-to-b from-purple-500 to-purple-600 text-white p-10 rounded-xl shadow-2xl w-72 transform hover:scale-105 transition-transform duration-300">
                <h3 class="text-xl font-bold mb-4">
                    Kelas Unggulan
                </h3>
                <p class="text-white text-sm mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque aliquam odio et faucibus. Nulla rhoncus feugiat eros quis consectetur.
                </p>
                <button class="bg-white text-black px-4 py-2 rounded-full flex items-center justify-center shadow-md mb-4 hover:bg-gray-100 transition-colors">
                    <img src="{{ asset('assets/image/icon buku.png') }}" alt="lorem ipsum" class="w-5 h-5 mr-2">
                    Lorem Ipsum
                </button>
                <button class="bg-white text-black px-4 py-2 rounded-full flex items-center justify-center shadow-md hover:bg-gray-100 transition-colors">
                    <img src="{{ asset('assets/image/icon lampu.png') }}" alt="lorem ipsum" class="w-5 h-5 mr-2">
                    Lorem Ipsum
                </button>
            </div>
        </div>
    </div>
    <div class="pt-12 ..."></div>
    {{-- About Us Section --}}
    <div id="tentang_kami" class="tentang_kami bg-blue-500 container mx-auto flex justify-center items-center py-20">
        <div class="text-yellow-400 mr-16">
            <h2 class="text-3xl font-bold mb-4">
                Tentang Kami
            </h2>
            <p class="mb-2 flex items-center">
                <i class="fas fa-map-marker-alt mr-2"></i>
                Jl. Imam Bonjol No.25, Hadimulyo Bar., Kec. Metro Pusat, Kota Metro, Lampung
            </p>
            <p class="mb-2 flex items-center">
                <i class="fas fa-envelope mr-2"></i>
                texascollege@gmail.com
            </p>
        </div>
        <div class="w-80 h-80 overflow-hidden rounded-lg shadow-lg">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.9577139093353!2d105.3037318!3d-5.1105182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40bbf05258878b%3A0x2fae40b1e33ec58e!2sTEXAS%20COLLEGE!5e0!3m2!1sid!2sid!4v1730103066426!5m2!1sid!2sid"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    <div class="pt-12 ..."></div>
    {{-- Contact Section --}}
    <div class="container mx-auto text-center py-20">
        <div class="bg-blue-500 text-yellow-400 p-8 rounded-lg shadow-lg inline-block w-96">
            <h2 class="text-2xl font-bold mb-2">
                Hubungi Kami
            </h2>
            <p class="mb-6 text-white">
                Jika ada pertanyaan lebih lanjut
            </p>
            <div class="flex justify-center space-x-4">
                <button class="bg-white text-pink-500 px-4 py-2 rounded-md flex items-center shadow-md">
                    <img src="{{ asset('assets/image/instagram.png') }}" alt="Instagram" class="w-5 h-5 mr-2">
                    Instagram
                </button>
                <button class="bg-white text-green-500 px-4 py-2 rounded-md flex items-center shadow-md">
                    <img src="{{ asset('assets/image/wa.png') }}" alt="WhatsApp" class="w-5 h-5 mr-2">
                    WhatsApp
                </button>
            </div>
        </div>
    </div>
    <div class="pt-12 ..."></div>
    {{-- Footer --}}
    <div class="container mx-auto text-center">
        <footer class="py-4 bg-blue-600 text-white text-center">
            <p>
                © 2023 Texas College Metro
            </p>
        </footer>
    </div>
</div>
