<div class="bg-isi-biodata h-screen p-6 overflow-x-hidden overflow-y-auto">
    <img alt="Logo" class="w-12" height="40" src="{{ asset('assets/image/logo.png') }}" />
    <div class="w-full flex justify-center items-center">
        <div class="w-full grid grid-cols-2 gap-6 md:px-12 min-h-full max-h-screen">
            <h1 class="col-span-2 text-xl font-bold text-center">Lengkapi Biodata</h1>
            <div class="col-span-2 flex items-center justify-center">
                <span
                    class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                    <span
                        class="me-2 border-2 px-3 py-1 border-primary-1100 rounded-full text-primary-1100 hidden md:block">1</span>
                    <span class="w-max text-primary-1100 flex">
                        <span class="hidden md:block after:content-['']">Isi</span>
                        Biodata
                    </span>
                </span>
                <div class="flex md:w-1/3 items-center sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-slate-500 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
                </div>
                <span class="flex items-center sm:after:hidden after:mx-2 after:text-gray-200">
                    <span
                        class="me-2 border-2 px-3 py-1 border-primary-1100 rounded-full text-primary-1100 hidden md:block">2</span>
                    <span class="w-max text-primary-1100 flex">Pembayaran
                        <span class="hidden md:block">Kelas</span>
                    </span>
                </span>
            </div>
            <h1 class="col-span-2 text-center text-secondary">Wajib membayar biaya pendaftaran sejumlah Rp.100.000.
                <span class="text-red-500 font-semibold">Jika melakukan pelunasan akan mendapatkan potongan
                    Rp.200.000</span>
            </h1>
            <form class="w-full col-span-2 grid grid-cols-1 gap-2 md:gap-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-6">
                    <div class="w-full flex flex-col gap-2 md:gap-4">
                        <x-input-text>Nomor rekening pengirim</x-input-text>
                        <x-input-text>Nama Pengirim</x-input-text>
                        <x-select-option option1="Pembayaran" option2="Angsuran">Pembayaran</x-select-option>
                        <x-select-option option1="BNI 12234567 An Nurul" option2="BRI 12234567 An Siti">Pilih bank
                            tujuan</x-select-option>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-400 border-dashed rounded-lg cursor-pointer bg-gray-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 text-center "><span class="font-semibold">Klik
                                        untuk unggah</span>atau letakkan file disini</p>
                                <p class="text-xs text-gray-500 text-center ">PNG, JPG, JPEG
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <x-button-primary type="button" href="{{ route('IsiBiodata') }}" iconType="iconArrowLeft"
                        :iconBeforeText="true">Kembali</x-button-primary>
                    <x-button-primary type="submit" href="{{ route('landingpage') }}" iconType="iconArrowRight"
                        :iconAfterText="true">Simpan</x-button-primary>
                </div>
            </form>
        </div>
    </div>
</div>
