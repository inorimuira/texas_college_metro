<div class="bg-isi-biodata h-screen p-6 overflow-x-hidden overflow-y-auto">
    <img alt="Logo" class="w-12" height="40" src="{{ asset('assets/image/logo.png') }}" />
    <div class="w-full flex justify-center items-center">
        <div class="w-full grid grid-cols-2 gap-6 md:px-12">
            <h1 class="col-span-2 text-xl font-bold text-center">Lengkapi Biodata</h1>
            <div class="col-span-2 flex items-center justify-center">
                <span
                    class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                    <span
                        class="me-2 border-2 px-3 py-1 border-primary-1100 rounded-full text-primary-1100 hidden md:block">1</span>
                    <span class="w-max text-primary-1100 flex">
                        <span class="hidden md:block me-1">Isi</span>
                        Biodata
                    </span>
                </span>
                <div class="flex md:w-1/3 items-center sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-slate-500 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
                </div>
                <span class="flex items-center sm:after:hidden after:mx-2 after:text-gray-200">
                    <span
                        class="me-2 border-2 px-3 py-1 border-slate-600 rounded-full text-slate-600 hidden md:block">2</span>
                    <span class="w-max text-slate-600 flex">Pembayaran<span class="hidden ms-1 md:block">Kelas</span>
                    </span>
                </span>
            </div>
            <form method="POST" class="w-full grid grid-cols-2 col-span-2 gap-2 md:gap-4">
                @csrf
                <x-input-text textReguler="true" required="true">Nama Lengkap</x-input-text>
                <x-input-text textReguler="true" required="true">Username</x-input-text>
                <x-input-text textReguler="true" required="true">Email</x-input-text>
                <x-input-text textReguler="true" required="true">Password</x-input-text>
                <x-input-text textReguler="true" required="true">Nomor Whatsapp</x-input-text>
                <x-input-date required="true">Tanggal Lahir</x-input-date>
                <x-input-text textReguler="true" required="true">NIK/NISN Siswa</x-input-text>
                <x-input-text textReguler="true" required="true">Asal Sekolah</x-input-text>
                <x-input-text textReguler="true" required="true">Nama Ayah</x-input-text>
                <x-input-text textReguler="true" required="true">Pekerjaan Ayah</x-input-text>
                <x-input-text textReguler="true" required="true">Nama Ibu</x-input-text>
                <x-input-text textReguler="true" required="true">Pekerjaan Ibu</x-input-text>
                <x-input-text textArea="true" required="true">Alamat Domisili</x-input-text>
                <x-input-text textArea="true" required="true">Alamat Sekolah</x-input-text>
                <div class="col-span-2 flex justify-end mt-6">
                    <x-button-primary type="submit" href="{{ route('Pembayaran') }}" iconType="iconArrowRight" :iconAfterText="true">Simpan</x-button-primary>
                </div>
            </form>
            
        </div>
    </div>
</div>
