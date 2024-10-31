<div class="bg-primary-200 w-full overflow-hidden">
    {{-- Navigation --}}
    <x-navigation></x-navigation>
    {{-- Hero Section --}}
    <div class="bg-white py-10 md:py-20 lg:py-20 xl:py-20 w-full">
        <div class="flex flex-col-reverse md:flex-row mx-6 lg:mx-24 justify-between items-center">
            <div class="flex flex-col gap-2.5 max-w-lg">
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
                    <a class="bg-primary-100 border border-primary-1300 text-primary-1300 px-3.5 py-3 rounded-full hidden md:block">
                        Hubungi Kami
                    </a>
                </div>
            </div>
            <img alt="Hero Banner" class="max-w-80" src="{{ asset('assets/image/hero-image.svg') }}" />
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
                    <ul class="text-base font-semibold text-primary-1700">
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
                    <ul class="text-base font-semibold text-primary-1700">
                        <li class="list-disc list-inside text-xs md:text-base">Conversation Class</li>
                        <li class="list-disc list-inside text-xs md:text-base">Toefl/Toeic Preparation</li>
                        <li class="list-disc list-inside text-xs md:text-base">English for Academic (Untuk PNS, TNI, Polri, Universitas, Dll)</li>
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
                        <img src="https://avatar.iran.liara.run/public" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa menjadi hal yang membangun bagi diri saya. dengan adanya texas college ini menjadi harapan besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas college akan terus berkembang”</span>
                    </div>
                </div>
                <div class="flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit">
                    <div class="flex gap-3.5">
                        <img src="https://avatar.iran.liara.run/public" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa menjadi hal yang membangun bagi diri saya. dengan adanya texas college ini menjadi harapan besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas college akan terus berkembang”</span>
                    </div>
                </div>
            </div>
            <div class="grid gap-y-4">
                <div class="flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit">
                    <div class="flex gap-3.5">
                        <img src="https://avatar.iran.liara.run/public" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa menjadi hal yang membangun bagi diri saya”</span>
                    </div>
                </div>
                <div class="flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit">
                    <div class="flex gap-3.5">
                        <img src="https://avatar.iran.liara.run/public" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa menjadi hal yang membangun bagi diri saya. dengan adanya texas college ini menjadi harapan besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas college akan terus berkembang. dengan adanya texas college ini menjadi harapan besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas college akan terus berkembang”</span>
                    </div>
                </div>
            </div>
            <div class="grid gap-y-4">
                <div class="flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit">
                    <div class="flex gap-3.5">
                        <img src="https://avatar.iran.liara.run/public" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa menjadi hal yang membangun bagi diri saya. dengan adanya texas college ini menjadi harapan besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas college akan terus berkembang. texas college ini menjadi harapan besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas college akan terus berkembang”</span>
                    </div>
                </div>
                <div class="flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit">
                    <div class="flex gap-3.5">
                        <img src="https://avatar.iran.liara.run/public" class="w-14" />
                        <div class="flex flex-col">
                            <span class="text-primary-100">Jamal</span>
                            <span class="text-primary-300">Siswa kelas reguler</span>
                        </div>
                    </div>
                    <div class="flex">
                        <span class="text-primary-100">“saya sudah 5 tahun menjadi murid di kelas reguler dan banyak manfaat yang saya rasakan. Saya sangat senang dengan hal ini dan saya berharap ini bisa menjadi hal yang membangun bagi diri saya. dengan adanya texas college ini menjadi harapan besar bagi saya untuk bisa belajar bahasa inggris. saya sangat senang dengan belajar di tempat ini dengan ruangan yang memiliki ac dan banyak fasilitas lain. saya berharap texas college akan terus berkembang”</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Contact Section --}}

    <div class="pt-12 ..."></div>
    {{-- Footer --}}
    <footer class="bg-primary-1300 shadow-md py-4 bg-blue-600 text-white text-center">
        <p>
            © 2023 Texas College Metro || All Rights Reserved
        </p>
    </footer>
</div>
