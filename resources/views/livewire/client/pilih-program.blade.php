<div class="w-full h-full max-h-fit min-h-screen text-center p-6">
    <h1 class="w-full text-2xl font-extrabold">Pilih Jenis Program</h1>
    <span class="text-base font-semibold ">Tentukan program yang ingin kamu jalani dan lanjutkan ke tahap
        selanjutnya dengan mengklik button pada pilihan program</span>
    <div class="w-full mt-12 grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-20">
        <div class="flex flex-col justify-center items-center bg-blue-500 rounded-lg shadow-lg p-6 md:p-12 gap-5">
            <img src="{{ asset('assets/image/card-kelas-reguler.svg') }}" alt="kelas reguler" class="max-w-[80%]" loading="lazy">
            <div class="flex flex-col justify-center">
                <span class="text-highlight text-2xl font-extrabold">Kelas Reguler</span>
                <span class="text-primary-100 text-sm font-bold">Kelas reguler untuk siswa dan mahasiswa
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
                class="max-w-[80%]" loading="lazy">
            <div class="flex flex-col justify-center">
                <span class="text-highlight text-2xl font-extrabold">Kelas Unggulan</span>
                <span class="text-primary-100 text-sm font-bold">Kelas khusus untuk kebutuhan tertentu, seperti persiapan TOEFL/TOEIC, tes PNS/TNI?POLRI, dan sebagainya
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
