<div class="w-full" x-data="{}">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Tambah Murid</h1>
                </div>
            </div>

            <form wire:submit.prevent="simpan" class="w-full grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3">
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="nama" class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="nama">Nama
                        Lengkap</label>
                    <input wire:model="nama" id="nama" type="text" placeholder="Masukan nama lengkap"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="email">Email</label>
                    <input wire:model="email" id="email" type="email" placeholder="Masukan email"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="program">Program</label>
                        <select wire:model="program" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Pilih Program</option>
                        <option value="Unggulan">Unggulan</option>
                        <option value="Reguler">Reguler</option>
                    </select>
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="tingkat_pemahaman">Tingkat Pemahaman</label>
                    <input wire:model="tingkat_pemahaman" type="text" placeholder="Masukan tingkat pemahaman"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="no_whatsapp">No. Whatsapp</label>
                    <input wire:model="no_whatsapp" type="number" placeholder="Masukan no whatsapp"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="tanggal-lahir">Tanggal Lahir</label>
                    <input wire:model="tanggal_lahir" type="date"
                        class="w-full rounded-lg text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="nik_nisn">NIK/NISN</label>
                    <input wire:model="nik_nisn" type="text" placeholder="Masukan NIK/NISN"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="alamat-domisili">Asal Sekolah</label>
                    <input wire:model="asal_sekolah" type="text" placeholder="Masukan asal sekolah"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="nama_ayah">Nama Ayah</label>
                    <input wire:model="nama_ayah" type="text" placeholder="Masukan nama ayah"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="pekerjaan_ayah">Pekerjaan Ayah</label>
                    <input wire:model="pekerjaan_ayah" type="text" placeholder="Masukan pekerjaan orang tua"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="nama_ibu">Nama Ibu</label>
                    <input wire:model="nama_ibu" type="text" placeholder="Masukan nama ibu"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="pekerjaan_ibu">Pekerjaan Ibu</label>
                    <input wire:model="pekerjaan_ibu" type="text" placeholder="Masukan pekerjaan orang tua"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="alamat_domisili">Alamat Domisili</label>
                    <textarea wire:model="alamat_domisili" rows="5" placeholder="Masukan alamat domisili" class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900"></textarea>
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="alamat_sekolah">Alamat Sekolah</label>
                    <textarea wire:model="alamat_sekolah" rows="5" placeholder="Masukan alamat domisili" class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900"></textarea>
                </div>

                <div class="md:col-span-2 place-items-end">
                    <x-button-primary type="submit" iconNone="true" class="text-sm">Simpan</x-button-primary>
                </div>

            </form>
        </div>
    </div>
</div>
