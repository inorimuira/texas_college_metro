<div class="bg-primary-200 w-full">
    {{-- Navigation --}}
    <x-navigation></x-navigation>
    {{-- Hero Section --}}
    <div class="bg-white py-10 md:py-20 lg:py-20 xl:py-20 w-full mt-16" data-aos="fade-down" data-aos-easing="linear"
        data-aos-duration="500">
        <div class="grid grid-rows-2 md:grid-rows-none md:grid-cols-2 h-fit mx-6 lg:mx-24 justify-center items-center">
            <div class="flex flex-col gap-2.5 max-w-lg w-full">
                <h1 class="text-4xl md:text-5xl text-primary-2100 font-bold mb-4">
                    {{ $judul_utama }}
                </h1>
                <p class="text-base font-medium text-primary-2100">
                    {{ $sub_judul }}
                </p>
                <div class="flex space-x-4">
                    <a href="{{ route('pilihprogram') }}"
                        class="flex items-center bg-primary-1300 text-primary-100 px-3.5 py-3 rounded-full transition-all duration-300 transform hover:bg-primary-1500 hover:px-4 hover:scale-105 hover:shadow-lg hover:shadow-primary-500">
                        <span class="">
                            Belajar Sekarang
                        </span>
                        <x-icon icon="iconNext"
                            class="transition-transform duration-300 transform hover:translate-x-2 hover:rotate-360"></x-icon>
                    </a>
                    <a href="#kontak"
                        class="bg-primary-100 border border-primary-1300 text-primary-1300 px-3.5 py-3 rounded-full hidden md:block">
                        Hubungi Kami
                    </a>
                </div>
            </div>
            <div class="w-full place-items-center">
                <img alt="Hero Banner"
                    class="w-full lg:max-w-4xl xl:max-w-3xl transition-transform duration-500 transform hover:scale-110 hover:rotate-3"
                    loading="lazy"
                    src="{{ asset($gambar != null ? 'storage/landingPage/' . $gambar : 'assets/image/hero-image.svg') }}"
                    loading="lazy" />
            </div>
        </div>
    </div>
    {{-- Program Section --}}
    <div id="program_kami" class="flex flex-col gap-8 mx-6 lg:mx-24 justify-between items-center py-20"
        data-aos="fade-down" data-aos-duration="600">
        <h1 class="text-4xl md:text-5xl text-primary-2100 font-bold mb-4">
            Program Kami
        </h1>
        <div class="flex flex-col gap-6 w-full">
            <div data-aos="fade-left" data-aos-duration="600"
                class="px-6 py-4 md:px-8 lg:px-24 rounded-lg border border-white/10 bg-white/50 backdrop-blur-sm flex justify-between items-center">
                <img src="{{ asset('assets/image/kelas-reguler.svg') }}" alt="Kelas Reguler" class="hidden md:block"
                    loading="lazy">
                <div class="flex flex-col gap-3">
                    <span class="text-2xl md:text-4xl font-semibold text-primary-2100">Kelas Reguler</span>
                    <ul class="text-base font-semibold text-slate-700">
                        <li class="list-disc list-inside text-xs md:text-base">Sekolah Dasar (SD)</li>
                        <li class="list-disc list-inside text-xs md:text-base">Sekolah Menengah Pertama (SMP)</li>
                        <li class="list-disc list-inside text-xs md:text-base">Sekolah Menengah Atas (SMA)</li>
                        <li class="list-disc list-inside text-xs md:text-base">Mahasiswa (S1, S2, S3 dll)</li>
                    </ul>
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="600"
                class="px-6 py-4 md:px-8 lg:px-24 rounded-lg border border-white/10 bg-white/50 backdrop-blur-sm flex justify-between items-center">
                <div class="flex flex-col gap-3">
                    <span class="text-2xl md:text-4xl font-semibold text-primary-2100">Kelas Unggulan</span>
                    <ul class="text-base font-semibold text-slate-700">
                        <li class="list-disc list-inside text-xs md:text-base">Conversation Class</li>
                        <li class="list-disc list-inside text-xs md:text-base">Toefl/Toeic Preparation</li>
                        <li class="list-disc list-inside text-xs md:text-base">English for Academic (Untuk PNS, TNI,
                            Polri, Universitas, Dll)</li>
                        <li class="list-disc list-inside text-xs md:text-base">English for Teacher/Training</li>
                    </ul>
                </div>
                <img src="{{ asset('assets/image/kelas-unggulan.svg') }}" alt="Kelas Unggulan" class="hidden md:block"
                    loading="lazy">
            </div>
        </div>
    </div>

    {{-- Review Section --}}
    <div id="review" class="flex flex-col gap-8 mx-6 lg:mx-24 justify-between items-center py-20" data-aos="zoom-in"
        data-aos-duration="600">
        <h1 class="text-center text-4xl md:text-5xl text-primary-2100 font-bold mb-4">
            "Apa Kata Mereka Tentang Kami?"
        </h1>
        <div class="flex overflow-visible overflow-x-scroll w-full custom-scroll snap-x snap-mandatory" id="carousel">
            @foreach ($data_review as $review)
                <div class="flex gap-x-6 lg:p-32 md:p-16 p-8 min-w-full snap-center">
                    <x-card-review name="{{ $review->nama }}" classType="{{ $review->grade }}"
                        text="{{ $review->review }}" />
                </div>
            @endforeach
        </div>
    </div>

    {{-- Offering Section --}}
    <div class="flex gap-16 justify-center items-center py-6 bg-primary-1700 px-6 md:px-24" data-aos="fade-right"
        data-aos-duration="800">
        <div class="hidden justify-end w-1/3 md:flex">
            <img src="{{ asset('assets/image/offering.svg') }}" alt="" class="min-w-64" loading="lazy">
        </div>
        <div class="flex flex-col text-center md:text-start gap-6 text-primary-100 w-full md:w-1/2">
            <span class="text-xl font-extrabold">Ingin bergabung dengan kami?</span>
            <span class="text-base font-semibold">Pilih program dan isi biodata untuk bergabung dengan kami. Kami akan
                memproses data kamu agar bisa cepat bergabung menjadi bagian kami</span>
            <div class="flex justify-center md:justify-normal">
                <a href="{{ route('pilihprogram') }}"
                    class="flex items-center bg-primary-1300 text-primary-100 px-3.5 py-3 rounded-full transition-all duration-300 transform hover:bg-primary-1500 hover:px-4 hover:scale-105 hover:shadow-lg hover:shadow-primary-600">
                    <span class="">
                        Belajar Sekarang
                    </span>
                    <x-icon icon="iconNext"
                        class="transition-transform duration-300 transform hover:translate-x-2 hover:rotate-360"></x-icon>
                </a>
            </div>
        </div>
    </div>

    {{-- Kontak Kami --}}
    <div id="kontak" class="flex flex-col gap-8 mx-6 lg:mx-24 justify-between items-center py-20">
        <h1 class="text-4xl md:text-5xl text-primary-2100 font-bold mb-4">
            Kontak Kami
        </h1>
        <div class="flex flex-wrap justify-center gap-6 md:gap-12 w-full">
            <x-card-kontak cardTitle="Temui kami disini"
                cardContent="Jl. Imam Bonjol No.25, Hadimulyo Bar, Kec. Metro Pusat, Kota Metro, Lampung"
                cardLink="https://maps.app.goo.gl/xjjQBJi9ZsxCS6nA9">
                <a href="">
                    <x-icon icon="iconMaps"></x-icon>
                </a>
            </x-card-kontak>
            <x-card-kontak cardTitle="Lihat media sosial kita" cardContent="@texascollege_englishcourse"
                cardLink="https://www.instagram.com/texascollege_englishcourse">
                <a href="">
                    <x-icon icon="iconInstagram"></x-icon>
                </a>
            </x-card-kontak>
            <x-card-kontak cardTitle="Hubungi kami lewat Whatsapp" cardContent="+6281373670389"
                cardLink="https://wa.me/+6281373670389">
                <a href="">
                    <x-icon icon="iconTelepon"></x-icon>
                </a>
            </x-card-kontak>
            <x-card-kontak cardTitle="Kirim email kepada kami" cardContent="texascollage@gmail.com"
                cardLink="https://mail.google.com/mail/u/0/?tf=cm&fs=1&to=texascollage@gmail.com">
                <a href="">
                    <x-icon icon="iconEmail"></x-icon>
                </a>
            </x-card-kontak>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="bg-primary-1300 shadow-md py-4 text-white text-center">
        <span>
            © 2023 Texas College Metro || All Rights Reserved
        </span>
    </footer>
</div>
