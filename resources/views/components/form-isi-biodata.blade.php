@props(['program'])

@if ($program == "kelasReguler")
    <form wire:submit.prevent="Simpan" class="w-full grid grid-cols-2 col-span-2 gap-2 md:gap-4">
        <x-input-text textReguler="true" section="showSection1" required="true" type="text" model="nama_lengkap">Nama Lengkap</x-input-text>
        <x-input-text textReguler="true" section="showSection1" required="true" type="email" model="email">Email</x-input-text>
        <x-input-text textReguler="true" section="showSection1" required="true" type="text" model="username">Username</x-input-text>
        <x-input-text textReguler="true" section="showSection1" required="true" type="password" model="password">Password</x-input-text>
        <x-input-text textReguler="true" section="showSection1" required="true" type="number" model="nomor_whatsapp">Nomor Whatsapp</x-input-text>
        <x-input-date required="true" section="showSection1" model="tgl_lahir">Tanggal Lahir</x-input-date>
        <x-input-text textReguler="true" section="showSection1" required="true" type="number" model="nik_nisn">NIK/NISN Siswa</x-input-text>
        <x-input-text textReguler="true" section="showSection1" required="true" type="text" model="asal_sekolah">Asal Sekolah</x-input-text>
        <x-input-text textReguler="true" section="showSection1" required="true" type="text" model="nama_ayah">Nama Ayah</x-input-text>
        <x-input-text textReguler="true" section="showSection1" required="true" type="text" model="pekerjaan_ayah">Pekerjaan Ayah</x-input-text>
        <x-input-text textReguler="true" section="showSection1" required="true" type="text" model="nama_ibu">Nama Ibu</x-input-text>
        <x-input-text textReguler="true" section="showSection1" required="true" type="text" model="pekerjaan_ibu">Pekerjaan Ibu</x-input-text>
        <x-input-text textArea="true" section="showSection1" required="true" model="alamat_domisili">Alamat Domisili</x-input-text>
        <x-input-text textArea="true" section="showSection1" required="true" model="alamat_sekolah">Alamat Sekolah</x-input-text>

        <div x-show="showSection1" class="col-span-2 flex justify-end mt-6">
            <x-button-primary type="button" @click="showSection1 = false; showSection2 = true" iconType="iconArrowRight" :iconAfterText="true">Selanjutnya</x-button-primary>
        </div>

        <span x-show="showSection2" class="col-span-2 text-center font-bold text-base">Biaya kursus: Rp 1.700.000 satu semester (6 Bulan)</span>
        <h1 x-show="showSection2" class="col-span-2 text-center text-secondary">Wajib membayar biaya pendaftaran sejumlah
            <span class="font-semibold text-slate-800">Rp 100.000</span>. Jika melakukan pelunasan akan mendapatkan
            <span class="text-red-500 font-semibold"> potongan Rp 200.000</span>
        </h1>

        <div x-show="showSection2" class="col-span-2 my-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-6">
                <div class="w-full flex flex-col gap-2 md:gap-4">

                    <x-input-text textReguler="true" section="showSection2" required="true" type="text" model="nomor_rekening">Nomor rekening pengirim</x-input-text>
                    <x-input-text textReguler="true" section="showSection2" required="true" type="text" model="atas_nama_rekening">Nama Pengirim</x-input-text>
                    <x-select-option option1="Lunas" option2="Angsuran">Pembayaran</x-select-option>
                    <x-select-option option1="BNI 12234567 An Nurul" option2="BRI 12234567 An Siti">Pilih bank tujuan</x-select-option>
                </div>

                <div x-data="{ fileName: '' }" class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-400 border-dashed rounded-lg cursor-pointer bg-gray-50">
                        <div class="flex flex-col items-center justify-center pt-5 pb ```html
                        -6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 text-center">
                                <span class="font-semibold" x-text="fileName ? fileName : 'Klik untuk unggah'"></span>
                                <span x-show="!fileName"> atau letakkan file disini</span>
                            </p>
                            <p class="text-xs text-gray-500 text-center" x-show="!fileName">PNG, JPG, JPEG</p>
                        </div>
                        <input type="file" id="dropzone-file" class="hidden" accept=".jpg, .jpeg, .png" @change="fileName = $event.target.files[0].name" />
                    </label>
                </div>
            </div>
            <div class="flex justify-between mt-6">
                <x-button-primary type="button" @click="showSection1 = true; showSection2 = false" iconType="iconArrowLeft" :iconBeforeText="true">Kembali</x-button-primary>
                <x-button-primary type="submit"
                    iconType="iconArrowRight" :iconAfterText="true">Simpan</x-button-primary>
            </div>
        </div>
    </form>
@elseif ($program == "kelasUnggulan")
    <form method="POST" class="w-full grid grid-cols-2 col-span-2 gap-2 md:gap-4">
        <x-input-text textReguler="true" type="text" required="true" model="nama_lengkap">Nama Lengkap</x-input-text>
        <x-input-text textReguler="true" type="email" required="true" model="email">Email</x-input-text>
        <x-input-text textReguler="true" type="text" required="true" model="username">Username</x-input-text>
        <x-input-text textReguler="true" type="text" required="true" model="password">Password</x-input-text>
        <x-input-text textReguler="true" type="number" required="true" model="nomor_whatsapp">Nomor Whatsapp</x-input-text>
        <x-input-date required="true" model="tgl_lahir">Tanggal Lahir</x-input-date>
        <x-input-text textReguler="true" type="number" required="true" model="nik_nisn">NIK/NISN Siswa</x-input-text>
        <x-input-text textReguler="true" type="text" required="true" model="asal_sekolah">Asal Sekolah</x-input-text>
        <x-input-text textReguler="true" type="text" required="true" model="nama_ayah">Nama Ayah</x-input-text>
        <x-input-text textReguler="true" type="text" required="true" model="pekerjaan_ayah">Pekerjaan Ayah</x-input-text>
        <x-input-text textReguler="true" type="text" required="true" model="nama_ibu">Nama Ibu</x-input-text>
        <x-input-text textReguler="true" type="text" required="true" model="pekerjaan_ibu">Pekerjaan Ibu</x-input-text>
        <x-input-text textArea="true" required="true" model="alamat_domisili">Alamat Domisili</x-input-text>
        <x-input-text textArea="true" required="true" model="alamat_sekolah">Alamat Sekolah</x-input-text>
        <x-input-text textReguler="true" type="text" required="true" model="keperluan_khusus">Keperluan Khusus</x-input-text>
        <div  x-show="showSection1" class="col-span-2 flex justify-end mt-6">
            <x-button-primary type="button" @click="showSection1 = false; showSection2 = true" iconType="iconArrowRight"
                :iconAfterText="true">Selanjutnya</x-button-primary>
        </div>

        <span x-show="showSection2" class="col-span-2 text-center font-bold text-base">Biaya kursus: Rp 1.700.000 satu semester (6 Bulan)</span>
        <h1 x-show="showSection2" class="col-span-2 text-center text-secondary">Wajib membayar biaya pendaftaran sejumlah
            <span class="font-semibold text-slate-800">Rp 100.000</span>. Jika melakukan pelunasan akan mendapatkan
            <span class="text-red-500 font-semibold"> potongan Rp 200.000</span>
        </h1>
        <div x-show="showSection2" class="col-span-2 my-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-6">
                <div class="w-full flex flex-col gap-2 md:gap-4">
                    <x-input-text textReguler="true" requred="true" type="text" model="nomo_rekening">Nomor rekening pengirim</x-input-text>
                    <x-input-text textReguler="true" requred="true" type="text" model="nomor_rekening">Nomor rekening pengirim</x-input-text>
                    <x-input-text textReguler="true" requred="true" type="text" model="atas_nama_rekening">Nama Pengirim</x-input-text>
                    <x-select-option option1="Lunas" option2="Angsuran">Pembayaran</x-select-option>
                    <x-select-option option1="BNI 12234567 An Nurul"
                        option2="BRI 12234567 An Siti">Pilih bank
                        tujuan</x-select-option>
                </div>
                <div x-data="{ fileName: '' }" class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-400 border-dashed rounded-lg cursor-pointer bg-gray-50">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 text-center">
                                <span class="font-semibold"
                                    x-text="fileName ? fileName : 'Klik untuk unggah'"></span>
                                <span x-show="!fileName"> atau letakkan file disini</span>
                            </p>
                            <p class="text-xs text-gray-500 text-center" x-show="!fileName">PNG, JPG,
                                JPEG</p>
                        </div>
                        <input type="file" id="dropzone-file" class="hidden"
                            accept=".jpg, .jpeg, .png"
                            @change="fileName = $event.target.files[0].name" />
                    </label>
                </div>
            </div>
            <div class="flex justify-between mt-6">
                <x-button-primary type="button" @click="showSection1 = true; showSection2 = false" iconType="iconArrowLeft"
                    :iconBeforeText="true">Kembali</x-button-primary>
                <x-button-primary type="submit"
                    iconType="iconArrowRight" :iconAfterText="true">Simpan</x-button-primary>
            </div>
        </div>
    </form>
@endif
