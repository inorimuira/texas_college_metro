<div class="w-full" x-data="{}">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Tambah Murid</h1>
                </div>
            </div>

            <form action="" class="w-full grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3">
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="nama">Nama
                        Lengkap</label>
                    <input type="text" placeholder="Masukan nama lengkap"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="nama">Username</label>
                    <input type="text" placeholder="Masukan nama lengkap"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="nama">Program</label>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Pilih Program</option>
                        <option value="Unggulan">Unggulan</option>
                        <option value="Reguler">Reguler</option>
                    </select>
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="tanggal-lahir">Tanggal Lahir</label>
                    <input type="date"
                        class="w-full rounded-lg text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="email">Email</label>
                    <input type="email" placeholder="Masukan email"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="password">Password</label>
                    <input type="password" placeholder="Masukan password"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="nik/nisn">NIK/NISN</label>
                    <input type="text" placeholder="Masukan NIK/NISN"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="alamat-domisili">Alamat Domisili</label>
                    <input type="text" placeholder="Masukan Alamat Domisili"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="alamat-domisili">Alamat Domisili</label>
                    <input type="text" placeholder="Masukan Alamat Domisili"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="alamat-domisili">Asal Sekolah</label>
                    <input type="text" placeholder="Masukan Alamat Domisili"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="alamat-domisili">Nama Ayah</label>
                    <input type="text" placeholder="Masukan Alamat Domisili"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="alamat-domisili">Nama Ibu</label>
                    <input type="text" placeholder="Masukan Alamat Domisili"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                        for="alamat-domisili">Pekerjaan Orang Tua</label>
                    <input type="text" placeholder="Masukan Alamat Domisili"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                    <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="alamat-domisili">No.
                        Whatsapp</label>
                    <input type="text" placeholder="Masukan Alamat Domisili"
                        class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                </div>
                <div class="md:col-span-2 place-items-end">
                    <x-button-primary iconNone="true" class="text-sm">Simpan</x-button-primary>
                </div>
            </form>
        </div>
    </div>
</div>
