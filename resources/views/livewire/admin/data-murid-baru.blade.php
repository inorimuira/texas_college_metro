<div class="w-full" x-data="{ isPreviewMurid: false, kelasUnggulan: true, kelasReguler: false, courseDone: true }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Data Murid Baru</h1>
                </div>
                <div class="">
                    <x-button-secondary type="button" iconNone="true" class="text-sm">Export</x-button-secondary>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center mb-4 relative">
                <input type="text"
                       placeholder="Cari"
                       wire:model.live.debounce.500ms="search"
                       class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 pr-10 transition duration-200 ease-in-out" />

            </div>

            <!-- Table Data Murid -->
            <table class="w-full table-auto">
                <thead class="">
                    <tr class="bg-primary-300">
                        <th class="px-4 py-2 border">Nama Lengkap</th>
                        <th class="px-4 py-2 border">NIK/NISN</th>
                        <th class="px-4 py-2 border">Asal Sekolah</th>
                        <th class="px-4 py-2 border">Program</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr class="">
                        <td class="px-4 py-3 border text-center text-sm">Satria Fattan G.</td>
                        <td class="px-4 py-3 border text-center text-sm">3671092107030002</td>
                        <td class="px-4 py-3 border text-center text-sm">SMA Negeri 1 Bekasi</td>
                        <td class="py-3 border text-center text-sm">
                            <template x-if="kelasUnggulan">
                                <span
                                    class="px-4 py-2 bg-highlight text-sm text-slate-700 font-semibold rounded-full">Unggulan</span>
                            </template>
                            <template x-if="kelasReguler">
                                <span
                                    class="px-4 py-2 bg-primary-1100 text-sm text-white font-semibold rounded-full">Reguler</span>
                            </template>
                        </td>
                        <td class="px-4 py-3 border text-center text-sm">
                            <template x-if="courseDone">
                                <span class="px-4 py-2 bg-emerald-200 text-sm text-emerald-800 font-semibold rounded-full">
                                    Selesai
                                </span>
                            </template>
                            <template x-if="!courseDone">
                                <span class="px-4 py-2 bg-amber-200 text-sm text-amber-800 font-semibold rounded-full">
                                    Belum Selesai
                                </span>
                            </template>
                        </td>
                        <td class="py-3 border text-center space-x-1">
                            <button class="" @click="isPreviewMurid = !isPreviewMurid">
                                <x-icon-admin icon="iconView" fill="#000"></x-icon-admin>
                            </button>
                            <button class="">
                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div x-show="isPreviewMurid" x-transition x-cloak
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-max p-5 relative"
                    @click.away="isPopupEditSummary = false">
                    <!-- Close Button -->
                    <button @click="isPreviewMurid = false"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                        <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                    </button>

                    <!-- Popup Header -->
                    <div class="flex items-center mb-4">
                        <h2 class="text-lg md:text-xl font-bold">Data Murid</h2>
                    </div>

                    <!-- Field Data Murid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-14 md:gap-y-3">
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Nama Lengkap
                            <span class="text-base font-normal text-gray-600">: Satria Fattan G.</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Username
                            <span class="text-base font-normal text-gray-600">: Satriaaa</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Program
                            <span class="text-base font-normal text-gray-600">
                                :
                                <template x-if="kelasUnggulan">
                                    <span
                                        class="px-4 py-2 bg-highlight text-sm text-slate-700 font-semibold rounded-full">Unggulan</span>
                                </template>
                                <template x-if="kelasReguler">
                                    <span
                                        class="px-4 py-2 bg-primary-1100 text-sm text-white font-semibold rounded-full">Reguler</span>
                                </template>
                            </span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Tanggal Lahir
                            <span class="text-base font-normal text-gray-600">: 17 November 2004</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Email
                            <span class="text-base font-normal text-gray-600">: satriafattan12@gmail.com</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Password
                            <span class="text-base font-normal text-gray-600">: ******</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            NIK/NISN
                            <span class="text-base font-normal text-gray-600">: 3671092107030002</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Alamat Domisili
                            <span class="text-base font-normal text-gray-600">: Jl. Bekasi Raya no.17</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Asal Sekolah
                            <span class="text-base font-normal text-gray-600">: SMA Negeri 1 Bekasi</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Alamat Sekolah
                            <span class="text-base font-normal text-gray-600">: Jl. Bekasi Tenggara no.1</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Nama Ayah
                            <span class="text-base font-normal text-gray-600">: Jamal Mulyadi</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Nama Ibu
                            <span class="text-base font-normal text-gray-600">: Jamil </span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Pekerjaan Orang Tua
                            <span class="text-base font-normal text-gray-600">: Pelaut</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            No. Whatsapp
                            <a href="https://wa.me/6289514137752" class="text-base font-normal text-indigo-500">:
                                089514137752</a>
                        </span>
                        {{-- <form action="" class="col-span-2 grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3">
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                                <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="nama">Nama
                                    Lengkap</label>
                                <input type="text" placeholder="Masukan nama lengkap"
                                    class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                                <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                                    for="nama">Username</label>
                                <input type="text" placeholder="Masukan username"
                                    class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                                <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                                    for="nama">Program</label>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                                <input type="text" placeholder="Masukan alamat domisili"
                                    class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                                <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                                    for="alamat-domisili">Asal Sekolah</label>
                                <input type="text" placeholder="Masukan asal sekolah"
                                    class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                                <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                                    for="alamat-domisili">Nama Ayah</label>
                                <input type="text" placeholder="Masukan nama ayah"
                                    class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                                <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                                    for="alamat-domisili">Nama Ibu</label>
                                <input type="text" placeholder="Masukan nama ibu"
                                    class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                                <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm"
                                    for="alamat-domisili">Pekerjaan Orang Tua</label>
                                <input type="text" placeholder="Masukan pekerjaan orang tua"
                                    class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 items-baseline">
                                <label class="after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="alamat-domisili">No.
                                    Whatsapp</label>
                                <input type="text" placeholder="Masukan no whatsapp"
                                    class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>
                            <div class="md:col-span-2 place-items-end">
                                <x-button-primary iconNone="true" class="text-sm">Simpan</x-button-primary>
                            </div>
                        </form> --}}
                    </div>
                    <div class="flex justify-end mt-3">
                        <x-button-primary iconNone="true">Edit</x-button-primary>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
