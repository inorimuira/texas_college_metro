<div tabindex="-1" x-show="isModalOpen" x-cloak
    class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-10 flex justify-center items-center w-full md:inset-0 h-full max-h-full backdrop-blur-sm bg-black bg-opacity-50 transition-opacity duration-300"
    @click.away="isModalOpen = false"
    x-transition:enter="transition-opacity ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-in duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative p-4 bg-modal rounded-lg shadow-xl">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                @click="isModalOpen = false">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-[#FFD233] w-12 h-12 " aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-semibold text-gray-500">Pastikan data yang diisi sudah benar!</h3>
                <button @click="isModalOpen = false" type="button"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Kembali
                </button>
                <button type="submit" isSimpanJawaban = true type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-primary-1100 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                    Kirim
                </button>
            </div>
        </div>
    </div>
</div>

<div tabindex="-1" x-show="isSimpanJawaban" x-cloak
    class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-10 flex justify-center items-center w-full md:inset-0 h-full max-h-full backdrop-blur-sm bg-black bg-opacity-50 transition-opacity duration-300"
    @click.away="isSimpanJawaban = false"
    x-transition:enter="transition-opacity ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-in duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative p-4 bg-modal rounded-lg shadow-xl">
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="#077F39E5" stroke-width="2" fill="transparent" />
                    <path stroke="#077F39E5" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12l4 4L18 8" />
                </svg>
                <h3 class="mb-5 text-lg font-semibold text-gray-500">Pendaftaran anda Berhasil!</h3>
                <span class="text-base ">Admin sedang memverifikasi pendaftaraan anda. Silahkan cek email secara berkala <a href="{{ route('landingpage') }}" class="text-primary-1100">kembali ke beranda</a></span>
            </div>
        </div>
    </div>
</div>
