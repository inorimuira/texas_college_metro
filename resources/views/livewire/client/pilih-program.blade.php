<div class="relative md:fixed bg-client-gradient bg-cover w-full min-h-screen">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full lg:max-w-[60%] p-6 text-center">
            <h1 class="w-full text-2xl font-extrabold">Pilih Jenis Program</h1>
            <span class="text-base font-semibold ">Tentukan program yang ingin kamu jalani dan lanjutkan ke tahap
                selanjutnya dengan mengklik button pada pilihan program</span>
            <div class="w-full mt-12 flex flex-col md:flex-row gap-10 md:justify-evenly lg:gap-20">
                <div class="flex flex-col justify-center items-center bg-blue-500 rounded-lg shadow-lg p-6 md:p-12 gap-5">
                    <img src="{{ asset('assets/image/card-kelas-reguler.svg') }}" alt="kelas reguler" class="max-w-[80%]">
                    <div class="flex flex-col justify-center">
                        <span class="text-highlight text-2xl font-extrabold">Kelas Reguler</span>
                        <span class="text-primary-100 text-sm font-bold">Lorem ipsum dolor sit, amet consectetur
                            adipisicing elit. Laudantium, repudiandae.</span>
                    </div>
                    <div class="w-full flex justify-center">
                        <a href="{{ route('IsiBiodata.KelasReguler') }}"
                            class="bg-primary-100 text-sm font-bold p-3 rounded-xl hover:bg-yellow-400 hover:text-slate-600 transition-all duration-500 ease-out">
                             Daftar Sekarang
                         </a>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center bg-blue-500 rounded-lg shadow-lg p-6 md:p-12 gap-5">
                    <img src="{{ asset('assets/image/card-kelas-unggulan.svg') }}" alt="kelas reguler"
                        class="max-w-[80%]">
                    <div class="flex flex-col justify-center">
                        <span class="text-highlight text-2xl font-extrabold">Kelas Unggulan</span>
                        <span class="text-primary-100 text-sm font-bold">Lorem ipsum dolor sit, amet consectetur
                            adipisicing elit. Laudantium, repudiandae.</span>
                    </div>
                    <div class="w-full flex justify-center">
                        <a href="{{ route('IsiBiodata.KelasUnggulan') }}"
                            class="bg-primary-100 text-sm font-bold p-3 rounded-xl hover:bg-yellow-400 hover:text-slate-600 transition-all duration-500 ease-out">
                             Daftar Sekarang
                         </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
