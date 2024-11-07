<div class="bg-primary-200 w-full overflow-x-hidden overflow-y-auto">
    {{-- Navigation --}}
    <x-navigation></x-navigation>
    {{-- Hero Section --}}
    <div class="bg-white py-10 md:py-20 lg:py-20 xl:py-20 w-full mt-16">
        <div class="flex flex-col-reverse md:flex-row mx-6 lg:mx-24 justify-between items-center">
            <div class="flex flex-col gap-2.5 max-w-lg w-full">
                <h1 class="text-4xl md:text-5xl text-primary-2100 font-bold mb-4">
                    Selamat Datang di Texas College Metro
                </h1>
                <p class="text-base font-medium text-primary-2100">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et tortor sit amet massa egestas
                    interdum. Proin laoreet diam, quis justo velit facilisis.
                </p>
                <div class="flex space-x-4">
                    <a class="flex items-center bg-primary-1300 text-primary-100 px-3.5 py-3 rounded-full">
                        <span class="">
                            Belajar Sekarang
                        </span>
                        <x-icon icon="iconNext"></x-icon>
                    </a>
                    <a
                        class="bg-primary-100 border border-primary-1300 text-primary-1300 px-3.5 py-3 rounded-full hidden md:block">
                        Hubungi Kami
                    </a>
                </div>
            </div>
            <div class="w-full place-items-center">
                <img alt="Hero Banner" class="w-full lg:max-w-4xl xl:max-w-3xl"
                    src="{{ asset('assets/image/hero-image.svg') }}" />
            </div>
        </div>
    </div>
    {{-- Program Section --}}
    <div id="program_kami" class="flex flex-col gap-8 mx-6 lg:mx-24 justify-between items-center py-20">
        <h1 class="text-4xl md:text-5xl text-primary-2100 font-bold mb-4">
            Program Kami
        </h1>
        <div class="flex flex-col gap-6 w-full">
            <div
                class="px-6 py-4 md:px-8 lg:px-24 rounded-lg border border-white/10 bg-white/50 backdrop-blur-sm flex justify-between items-center">
                <img src="{{ asset('assets/image/kelas-reguler.svg') }}" alt="Kelas Reguler" class="hidden md:block ">
                <div class="flex flex-col gap-3">
                    <span class="text-2xl md:text-4xl font-semibold text-primary-2100">Kelas Reguler</span>
                    <ul class="text-base font-semibold text-slate-700">
                        <li class="list-disc list-inside text-xs md:text-base">Sekolah Dasar (SD)</li>
                        <li class="list-disc list-inside text-xs md:text-base">Sekolah Menengah Pertama (SMP)</li>
                        <li class="list-disc list-inside text-xs md:text-base">Sekolah Menengah Atas (SMA)</li>
                    </ul>
                </div>
            </div>
            <div
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
                <img src="{{ asset('assets/image/kelas-unggulan.svg') }}" alt="Kelas Unggulan" class="hidden md:block ">
            </div>
        </div>
    </div>
    {{-- Review Section --}}
    <div id="review" class="flex flex-col gap-8 mx-6 lg:mx-24 justify-between items-center py-20">
        <h1 class="text-center text-4xl md:text-5xl text-primary-2100 font-bold mb-4">
            "Apa Kata Mereka Tentang Kami?"
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 max-h-min gap-6">
            <div class="grid gap-y-4">
                <div class="flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit">
                    <div class="flex gap-3.5">
                        <img src="{{ asset('assets/image/avatar.png') }}" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak
                            manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa
                            menjadi hal yang membangun bagi diri saya. dengan adanya texas college ini menjadi harapan
                            besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di
                            tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas
                            college akan terus berkembang”</span>
                    </div>
                </div>
                <div class="flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit">
                    <div class="flex gap-3.5">
                        <img src="{{ asset('assets/image/avatar.png') }}" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak
                            manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa
                            menjadi hal yang membangun bagi diri saya. dengan adanya texas college ini menjadi harapan
                            besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di
                            tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas
                            college akan terus berkembang”</span>
                    </div>
                </div>
            </div>
            <div class="grid gap-y-4">
                <div class="flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit">
                    <div class="flex gap-3.5">
                        <img src="{{ asset('assets/image/avatar.png') }}" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak
                            manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa
                            menjadi hal yang membangun bagi diri saya”</span>
                    </div>
                </div>
                <div class="flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit">
                    <div class="flex gap-3.5">
                        <img src="{{ asset('assets/image/avatar.png') }}" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak
                            manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa
                            menjadi hal yang membangun bagi diri saya. dengan adanya texas college ini menjadi harapan
                            besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di
                            tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas
                            college akan terus berkembang. dengan adanya texas college ini menjadi harapan besar bagi
                            saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di tempat ini
                            dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas college akan
                            terus berkembang”</span>
                    </div>
                </div>
            </div>
            <div class="grid gap-y-4">
                <div class="flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit">
                    <div class="flex gap-3.5">
                        <img src="{{ asset('assets/image/avatar.png') }}" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak
                            manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa
                            menjadi hal yang membangun bagi diri saya. dengan adanya texas college ini menjadi harapan
                            besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di
                            tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas
                            college akan terus berkembang. texas college ini menjadi harapan besar bagi saya untuk bisa
                            belajar bahasa inggris. saya sangat senang dengan belajar di tempat ini dengan ruangan yang
                            memiliki ac dan banyak fasilitas lain. saya berharap texas college akan terus
                            berkembang”</span>
                    </div>
                </div>
                <div class="flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit">
                    <div class="flex gap-3.5">
                        <img src="{{ asset('assets/image/avatar.png') }}" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak
                            manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa
                            menjadi hal yang membangun bagi diri saya. dengan adanya texas college ini menjadi harapan
                            besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di
                            tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas
                            college akan terus berkembang”</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Offering Section --}}
    <div class="flex gap-16 justify-center items-center py-6 bg-primary-1700 px-6 md:px-24">
        <div class="hidden justify-end w-1/3 md:flex">
            <img src="{{ asset('assets/image/offering.svg') }}" alt="" class="min-w-64">
        </div>
        <div class="flex flex-col text-center md:text-start gap-6 text-primary-100 w-full md:w-1/2">
            <span class="text-xl font-extrabold">Ingin bergabung dengan kami?</span>
            <span class="text-base font-semibold">Pilih program dan isi biodata untuk bergabung dengan kami. Kami akan
                memproses data kamu agar bisa cepat bergabung menjadi bagian kami</span>
            <div class="flex justify-center md:justify-normal">
                <button class="bg-primary-1300 flex items-center px-3.5 py-3 rounded-xl gap-2.5">
                    Belajar Sekarang
                    <x-icon icon="iconNext"></x-icon>
                </button>
            </div>
        </div>
    </div>
    {{-- Kontak Kami --}}
    <div id="kontak" class="flex flex-col gap-8 mx-6 lg:mx-24 justify-between items-center py-20">
        <h1 class="text-4xl md:text-5xl text-primary-2100 font-bold mb-4">
            Kontak Kami
        </h1>
        <div class="flex flex-wrap justify-center gap-6 md:gap-12 w-full">
            <x-card-kontak cardTitle="Temui kami disini" cardContent="Jl. Imam Bonjol No.25, Hadimulyo Bar, Kec. Metro Pusat, Kota Metro, Lampung">
                <x-icon icon="iconMaps"></x-icon>
            </x-card-kontak>
            <x-card-kontak cardTitle="Lihat media sosial kita" cardContent="@texascollege_englishcourse">
                <x-icon icon="iconInstagram"></x-icon>
            </x-card-kontak>
            <x-card-kontak cardTitle="Hubungi kami lewat Whatsapp" cardContent="+6281373670389">
                <x-icon icon="iconTelepon"></x-icon>
            </x-card-kontak>
            <x-card-kontak cardTitle="Kirim email kepada kami" cardContent="texascollage@gmail.com" >
                <x-icon icon="iconEmail"></x-icon>
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
