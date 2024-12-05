<div class="w-full" x-data="{ isPreviewSiswa: false, kelasUnggulan: true, kelasReguler: false }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Tambah Siswa</h1>
                </div>
            </div>

            <form action="" class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3">
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" placeholder="Masukan nama lengkap" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="nama">Username</label>
                    <input type="text" placeholder="Masukan nama lengkap" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="nama">Program</label>
                    <input type="text" placeholder="Masukan nama lengkap" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="nama">Tanggal Lahir</label>
                    <input type="date" placeholder="Masukan tanggal lahir" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Masukan email" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Masukan password" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="nik/nisn">NIK/NISN</label>
                    <input type="text" placeholder="Masukan NIK/NISN" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="alamat-domisili">Alamat Domisili</label>
                    <input type="text" placeholder="Masukan Alamat Domisili" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="alamat-domisili">Alamat Domisili</label>
                    <input type="text" placeholder="Masukan Alamat Domisili" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="alamat-domisili">Asal Sekolah</label>
                    <input type="text" placeholder="Masukan Alamat Domisili" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="alamat-domisili">Nama Ayah</label>
                    <input type="text" placeholder="Masukan Alamat Domisili" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="alamat-domisili">Nama Ibu</label>
                    <input type="text" placeholder="Masukan Alamat Domisili" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="alamat-domisili">Pekerjaan Orang Tua</label>
                    <input type="text" placeholder="Masukan Alamat Domisili" class="w-full rounded-lg placeholder:text-sm">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label for="alamat-domisili">No. Whatsapp</label>
                    <input type="text" placeholder="Masukan Alamat Domisili" class="w-full rounded-lg placeholder:text-sm">
                </div>
            </form>
            <div class="flex justify-end mt-3">
                <x-button-primary iconNone="true">Simpan</x-button-primary>
            </div>
        </div>
    </div>
</div>
