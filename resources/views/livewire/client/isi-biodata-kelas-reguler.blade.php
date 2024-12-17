<div class="bg-isi-biodata h-screen p-6 overflow-x-hidden overflow-y-auto">
    <img alt="Logo" class="w-12" height="40" src="{{ asset('assets/image/logo.png') }}" loading="lazy"/>
    <div class="w-full flex justify-center items-center">
        <div class="w-full grid grid-cols-2 gap-6 md:px-12" x-data="{ showSection1: @entangle('showSection1'), showSection2: @entangle('showSection2') }" x-cloak>
            <h1 class="col-span-2 text-xl font-bold text-center">Lengkapi Biodata</h1>
            <div class="col-span-2 flex items-center justify-center">
                <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                    <span
                        class="me-2 border-2 px-3 py-1 border-primary-1100 rounded-full text-primary-1100 hidden md:block">1</span>
                    <span class="w-max text-primary-1100 flex">
                        <span class="hidden md:block me-1">Isi Biodata</span>
                    </span>
                </span>
                <div
                    class="flex md:w-1/3 items-center sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-slate-500 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
                </div>
                <span x-show="showSection1" class="flex items-center sm:after:hidden after:mx-2 after:text-gray-200">
                    <span
                        class="me-2 border-2 px-3 py-1 border-slate-600 rounded-full text-slate-600 hidden md:block">2</span>
                    <span class="w-max text-slate-600 flex">Pembayaran<span class="hidden ms-1 md:block">Kelas</span>
                    </span>
                </span>

                <span x-show="showSection2" class="flex items-center sm:after:hidden after:mx-2 after:text-gray-200">
                    <span
                        class="me-2 border-2 px-3 py-1 border-primary-1100 rounded-full text-primary-1100 hidden md:block">2</span>
                    <span class="w-max text-primary-1100 flex">Pembayaran<span class="hidden ms-1 md:block">Kelas</span>
                    </span>
                </span>
            </div>

            <x-form-isi-biodata program="kelasReguler" :errors="$errors"></x-form-isi-biodata>
        </div>
    </div>
</div>
