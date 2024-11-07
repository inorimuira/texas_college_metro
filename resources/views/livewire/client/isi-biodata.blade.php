<div class="bg-isi-biodata h-screen p-6 overflow-x-hidden overflow-y-auto">
    <img alt="Logo" class="w-12" height="40" src="{{ asset('assets/image/logo.png') }}" />
    <div class="w-full flex justify-center items-center">
        <div class="w-full grid grid-cols-2 gap-6 md:px-12">
            <h1 class="col-span-2 text-xl font-bold text-center">Lengkapi Biodata</h1>
            <div class="col-span-2 flex items-center">
                <ol
                    class="flex justify-center items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                    <li
                        class="flex md:w-full items-center sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-slate-500 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
                        <span
                            class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                            <span
                                class="me-2 border-2 px-3 py-1 border-primary-1100 rounded-full text-primary-1100 hidden md:block">1</span>
                            <span class="w-max text-primary-1100 flex">
                                <span class="hidden md:block after:content-['']">Isi</span> 
                                Biodata
                            </span>
                        </span>
                    </li>
                    <li
                        class="flex md:w-full items-center ">
                        <span class="flex items-center sm:after:hidden after:mx-2 after:text-gray-200">
                            <span class="me-2 border-2 px-3 py-1 border-slate-500 rounded-full text-slate-500 hidden md:block">2</span>
                            <span class="w-max text-slate-500 flex">Pembayaran
                                <span class="hidden md:block">Kelas</span>
                            </span>
                        </span>
                    </li>
                </ol>
            </div>
            <form class="w-full grid grid-cols-2 col-span-2 gap-2 md:gap-4">
                <x-input-text>Username</x-input-text>
                <x-input-text>Password</x-input-text>
                <x-input-text>Tanggal Lahir</x-input-text>
                <x-input-text>Email</x-input-text>
                <x-input-text>Nama Lengkap</x-input-text>
                <x-input-text>NIK/NISN</x-input-text>
                <x-input-text>Alamat Domisili</x-input-text>
                <x-input-text>Alamat Sekolah</x-input-text>
                <x-input-text>Asal Sekolah</x-input-text>
                <x-input-text>Nama Ayah</x-input-text>
                <x-input-text>Nama Ibu</x-input-text>
                <x-input-text>Pekerjaan Ayah</x-input-text>
                <x-input-text>Pekerjaan Ibu</x-input-text>
                <x-input-text>Nomor Whatsapp</x-input-text>
                <div class="col-span-2 flex justify-center">
                    <x-button-primary type="submit" class="flex items-center after:content-['>'] after:ms-2">Berikutnya</x-button-primary>
                </div>                               
            </form>
        </div>
    </div>
</div>
