@props(['program', 'errors'])

@php
    $jadwal = [
        "Selasa & Kamis, 16.00-17.30 (1,5 jam/hari)",
        "Rabu & Jumat 16.00-17.30 (1,5 jam/hari)",
        "⁠Selasa & Kamis 14.30-16.00 (1,5 jam/hari)",
        "Sabtu 09.00-12.00 (3 jam/hari)",
        "Sabtu 14.00-17.00 (3 jam/hari)"
    ];

    if ($program == 'kelasReguler') {
        $jenisPembayaran = [
            "Lunas" => "Lunas (Rp 1.600.000)",
            "Angsuran" => "Angsuran (Rp 100.000)"
        ];
    } elseif ($program == 'kelasUnggulan') {
        $jenisPembayaran = [
            "Lunas" => "Lunas (Rp 1.400.000)",
            "Angsuran" => "Angsuran (Rp 100.000)"
        ];
    }

    $rekeningTujuan = [
        "BNI 12234567 An Nurul",
        "BRI 12234567 An Siti"
    ];

    $tingkatPendidikan = [
        "SD", "SMP", "SMA", "D1", "D2", "D3", "D4", "S1", "S2", "S3"
    ];
@endphp


@if ($program == 'kelasReguler')
    <form wire:submit.prevent="Simpan" class="w-full grid grid-cols-2 col-span-2 gap-2 md:gap-4" x-data="{ isModalOpen: @entangle('isModalOpen'), isSimpanJawaban: @entangle('isSimpanJawaban')}" enctype="multipart/form-data">
        {{-- start section 1 --}}
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="nama_lengkap" placeholder="masukkan nama lengkap">Nama Lengkap</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="email" model="email" placeholder="masukkan email">Email</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="username" placeholder="masukkan username">Username</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="password" model="password" placeholder="masukkan password">Password</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="number" model="nomor_whatsapp" placeholder="masukkan nomor whatsapp (ex: 08123456789) tanpa kode negara">Nomor Whatsapp</x-input-text>
        <x-input-date required="true" :errors="$errors" section="showSection1" model="tgl_lahir">Tanggal Lahir</x-input-date>
        <x-select-option section="showSection1" :errors="$errors" :options="$tingkatPendidikan" model="tingkat_pendidikan">Tingkat Pendidikan</x-select-option>
        <x-select-option section="showSection1" :errors="$errors" :options="$jadwal" model="jadwal">Jadwal</x-select-option>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="number" model="nik_nisn" placeholder="masukkan nik/nisn murid">NIK/NISN Murid</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="asal_sekolah" placeholder="masukkan asal sekolah">Asal Sekolah</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="nama_ayah" placeholder="masukkan nama ayah">Nama Ayah</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="pekerjaan_ayah" placeholder="masukkan pekerjaan ayah">Pekerjaan Ayah</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="nama_ibu" placeholder="masukkan nama ibu">Nama Ibu</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="pekerjaan_ibu" placeholder="masukkan pekerjaan ibu">Pekerjaan Ibu</x-input-text>
        <x-input-text textArea="true" :errors="$errors" section="showSection1" required="true" model="alamat_domisili" placeholder="masukkan alamat domisili">Alamat Domisili</x-input-text>
        <x-input-text textArea="true" :errors="$errors" section="showSection1" required="true" model="alamat_sekolah" placeholder="masukkan alamat sekolah">Alamat Sekolah</x-input-text>

        <div x-show="showSection1" class="col-span-2 flex justify-end mt-6">
            <x-button-primary type="button" @click="showSection1 = false; showSection2 = true" iconType="iconArrowRight" :iconAfterText="true">Selanjutnya</x-button-primary>
        </div>
        {{-- end section1 --}}

        {{-- start section2 --}}
        <span x-show="showSection2" class="col-span-2 text-center font-bold text-base">
            Biaya kursus: <del class="text-gray-500">Rp 1.700.000</del> Rp 1.500.000 (diskon Rp 200.000 jika membayar lunas di awal).
        </span>
        <h1 x-show="showSection2" class="col-span-2 text-center text-secondary">
            Wajib membayar biaya pendaftaran Rp 100.000. Total jika lunas di awal: <span class="text-green-600 font-bold">Rp 1.600.000</span>.
        </h1>

        <div x-show="showSection2" class="col-span-2 my-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-6">
                <div class="w-full flex flex-col gap-2 md:gap-4">
                    <x-input-text textReguler="true" :errors="$errors" section="showSection2" required="true" type="number" model="nomor_rekening_pengirim" placeholder="masukkan nomor rekening pengirim">Nomor rekening pengirim</x-input-text>
                    <x-input-text textReguler="true" :errors="$errors" section="showSection2" required="true" type="text" model="atas_nama_rekening_pengirim" placeholder="masukkan atas nama rekening pengirim">Nama Pengirim</x-input-text>
                    <x-input-text textReguler="true" :errors="$errors" section="showSection2" required="true" type="number" model="nominal_pembayaran" placeholder="masukkan nominal pembayaran">Nominal Bayar</x-input-text>
                    <x-select-option section="showSection2" :errors="$errors" type="pembayaran" :options="$jenisPembayaran" model="jenis_pembayaran">Pembayaran</x-select-option>
                    <x-select-option section="showSection2" :errors="$errors" :options="$rekeningTujuan" model="rekening_tujuan">Pilih bank tujuan</x-select-option>
                </div>

                <div x-data="{ fileName: '' }" class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-400 border-dashed rounded-lg cursor-pointer bg-gray-50">
                        <div
                            class="flex flex-col items-center justify-center pt-5 pb ```html
                        -6">
                            @if($errors['bukti_pembayaran'] ?? false)
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <span class="mb-2 text-sm text-center font-semibold" :class="fileName ? 'text-gray-500' : 'text-red-500'" x-text="fileName ? fileName : '{{ $errors['bukti_pembayaran'][0] }}'"></span>
                            @else
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 text-center">
                                    <span class="font-semibold" x-text="fileName ? fileName : 'Klik untuk unggah'"></span>
                                    <span x-show="!fileName"> atau letakkan file disini</span>
                                </p>
                                <p class="text-xs text-gray-500 text-center" x-show="!fileName">PNG, JPG, JPEG</p>
                            @endif
                        </div>
                        <input type="file" wire:model="bukti_pembayaran" id="dropzone-file" class="hidden" accept=".jpg, .jpeg, .png"
                            @change="fileName = $event.target.files[0].name" />
                    </label>
                    @if (array_key_exists('bukti_pembayaran', $errors) && count($errors['bukti_pembayaran']) > 0)
                        <div class="mt-2 text-red-500 text-sm">
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex justify-between mt-6">
                <x-button-primary type="button" @click="showSection1 = true; showSection2 = false"
                    iconType="iconArrowLeft" :iconBeforeText="true">Kembali</x-button-primary>
                <x-button-primary type="button" @click="isModalOpen = true" iconType="iconArrowRight" :iconAfterText="true">Simpan</x-button-primary>
            </div>
        </div>
        <x-modal-warning type="pendaftaran"></x-modal-warning>
        {{-- end section2 --}}
    </form>
@elseif ($program == 'kelasUnggulan')
    <form wire:submit.prevent="Simpan" class="w-full grid grid-cols-2 col-span-2 gap-2 md:gap-4" x-data="{ isModalOpen: @entangle('isModalOpen'), isSimpanJawaban: @entangle('isSimpanJawaban')}" enctype="multipart/form-data">

        {{-- start section1 --}}
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="nama_lengkap" placeholder="masukkan nama lengkap">Nama Lengkap</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="email" model="email" placeholder="masukkan email">Email</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="username" placeholder="masukkan username">Username</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="password" model="password" placeholder="masukkan password">Password</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="number" model="nomor_whatsapp" placeholder="masukkan nomor whatsapp (ex: 08123456789) tanpa kode negara">Nomor Whatsapp</x-input-text>
        <x-input-date required="true" :errors="$errors" section="showSection1" model="tgl_lahir">Tanggal Lahir</x-input-date>
        <x-select-option section="showSection1" :errors="$errors" :options="$tingkatPendidikan" model="tingkat_pendidikan">Tingkat Pendidikan</x-select-option>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="number" model="nik_nisn" placeholder="masukkan nik/nisn murid">NIK/NISN Murid</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="asal_sekolah" placeholder="masukkan asal sekolah">Asal Sekolah</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="keperluan_khusus">Keperluan Khusus</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="nama_ayah" placeholder="masukkan nama ayah">Nama Ayah</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="pekerjaan_ayah" placeholder="masukkan pekerjaan ayah">Pekerjaan Ayah</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="nama_ibu" placeholder="masukkan nama ibu">Nama Ibu</x-input-text>
        <x-input-text textReguler="true" :errors="$errors" section="showSection1" required="true" type="text" model="pekerjaan_ibu" placeholder="masukkan pekerjaan ibu">Pekerjaan Ibu</x-input-text>
        <x-input-text textArea="true" :errors="$errors" section="showSection1" required="true" model="alamat_domisili" placeholder="masukkan alamat domisili">Alamat Domisili</x-input-text>
        <x-input-text textArea="true" :errors="$errors" section="showSection1" required="true" model="alamat_sekolah" placeholder="masukkan alamat sekolah">Alamat Sekolah</x-input-text>

        <div x-show="showSection1" class="col-span-2 flex justify-end mt-6">
            <x-button-primary type="button" @click="showSection1 = false; showSection2 = true"
                iconType="iconArrowRight" :iconAfterText="true">Selanjutnya</x-button-primary>
        </div>
        {{-- end section1 --}}

        {{-- start section2 --}}
        <span x-show="showSection2" class="col-span-2 text-center font-bold text-base">
            Biaya kursus: <del class="text-gray-500">Rp 1.500.000</del> Rp 1.300.000 (diskon Rp 200.000 jika membayar lunas di awal).
        </span>
        <h1 x-show="showSection2" class="col-span-2 text-center text-secondary">
            Wajib membayar biaya pendaftaran Rp 100.000. Total jika lunas di awal: <span class="text-green-600 font-bold">Rp 1.400.000</span>.
        </h1>

        <div x-show="showSection2" class="col-span-2 my-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-6">
                <div class="w-full flex flex-col gap-2 md:gap-4">
                    <x-input-text textReguler="true" :errors="$errors" section="showSection2" required="true" type="number" model="nomor_rekening_pengirim" placeholder="masukkan nomor rekening pengirim">Nomor rekening pengirim</x-input-text>
                    <x-input-text textReguler="true" :errors="$errors" section="showSection2" required="true" type="text" model="atas_nama_rekening_pengirim" placeholder="masukkan atas nama rekening pengirim">Nama Pengirim</x-input-text>
                    <x-input-text textReguler="true" :errors="$errors" section="showSection2" required="true" type="number" model="nominal_pembayaran" placeholder="masukkan nominal pembayaran">Nominal Bayar</x-input-text>
                    <x-select-option section="showSection2" :errors="$errors" type="pembayaran" :options="$jenisPembayaran" model="jenis_pembayaran">Pembayaran</x-select-option>
                    <x-select-option section="showSection2" :errors="$errors" :options="$rekeningTujuan" model="rekening_tujuan">Pilih bank tujuan</x-select-option>
                </div>

                <div x-data="{ fileName: '' }" class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-400 border-dashed rounded-lg cursor-pointer bg-gray-50">
                        <div
                            class="flex flex-col items-center justify-center pt-5 pb ```html
                        -6">
                            @if($errors['bukti_pembayaran'] ?? false)
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <span class="mb-2 text-sm text-center font-semibold" :class="fileName ? 'text-gray-500' : 'text-red-500'" x-text="fileName ? fileName : '{{ $errors['bukti_pembayaran'][0] }}'"></span>
                            @else
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 text-center">
                                    <span class="font-semibold" x-text="fileName ? fileName : 'Klik untuk unggah'"></span>
                                    <span x-show="!fileName"> atau letakkan file disini</span>
                                </p>
                                <p class="text-xs text-gray-500 text-center" x-show="!fileName">PNG, JPG, JPEG</p>
                            @endif
                        </div>
                        <input type="file" wire:model="bukti_pembayaran" id="dropzone-file" class="hidden" accept=".jpg, .jpeg, .png"
                            @change="fileName = $event.target.files[0].name" />
                    </label>
                    @if (array_key_exists('bukti_pembayaran', $errors) && count($errors['bukti_pembayaran']) > 0)
                        <div class="mt-2 text-red-500 text-sm">
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex justify-between mt-6">
                <x-button-primary type="button" @click="showSection1 = true; showSection2 = false"
                    iconType="iconArrowLeft" :iconBeforeText="true">Kembali</x-button-primary>
                <x-button-primary type="button" @click="isModalOpen = true" iconType="iconArrowRight" :iconAfterText="true">Simpan</x-button-primary>
            </div>
        </div>
        <x-modal-warning type="pendaftaran"></x-modal-warning>
        {{-- end section2 --}}
    </form>
@endif
