<div class="w-full"
    x-data="{ detailKelas: false, detailSiswa:false, absenAktif: false, isTambahKelas: false, isTambahAbsen: false, isAktivasiAbsen: false, showModal: false }">
    <div class="p-8">
        {{-- Default --}}
        <div x-show="!detailKelas && !detailSiswa" x-cloak class="bg-white shadow-md rounded-md p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Kelola Absensi</h1>
                    <p class="text-gray-500">Kelola seluruh absen siswa</p>
                </div>
                <div @click="isTambahKelas = !isTambahKelas">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Tambah
                        Kelas</button>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari"
                    class="w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                    <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600" alt="Book Icon">
                </button>
            </div>

            <!-- Table -->
            <div class="rounded-lg">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-gray-700">
                            <th class="py-2 px-4 border-b w-3/4 text-start">Kelas</th>
                            <th class="py-2 px-4 border-b w-1/4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        <tr>
                            <td class="py-2 px-4 border-b w-3/4">Kelas 1</td>
                            <td class="py-2 px-4 border-b w-full flex items-center justify-center">
                                <a class="mr-2" @click="detailKelas = !detailKelas">
                                    <x-button-secondary type="button" iconNone="true" class="text-sm">Detail</x-button-secondary>
                                </a>
                                <a href="" class="mr-2">
                                    <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Detail Chapter --}}
        <div x-show="detailKelas && !detailSiswa" x-cloak class="bg-white shadow-md rounded-md p-6">
            <x-button-primary iconBeforeText="true" iconType="iconArrowLeft" class="mb-3" @click="detailKelas = !detailKelas"></x-button-primary>
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Kelola Absensi</h1>
                    <p class="text-gray-500">Kelola seluruh absen siswa</p>
                </div>
                <div @click="isTambahAbsen = true">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Tambah
                        Absen</button>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari"
                    class="w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                    <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600" alt="Book Icon">
                </button>
            </div>

            <!-- Table -->
            <div class="rounded-lg">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-gray-700">
                            <th class="py-2 px-4 border-b w-2/4 text-start">Chapter</th>
                            <th class="py-2 px-4 border-b w-1/4 text-center">Status Absensi</th>
                            <th class="py-2 px-4 border-b w-1/4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        <tr>
                            <td class="py-2 px-4 border-b w-2/4">Chapter 1</td>
                            <td class="py-2 px-4 border-b w-1/4 text-center">
                                <template x-if="absenAktif">
                                    <span class="bg-green-200 text-green-800 px-2 py-1 text-sm rounded-lg">Aktif</span>
                                </template>
                                <template x-if="!absenAktif">
                                    <span class="bg-red-200 text-red-800 px-2 py-1 text-sm rounded-lg">Tidak Aktif</span>
                                </template>
                            </td>
                            <td class="py-2 px-4 border-b w-full flex items-center justify-center">
                                <a class="mr-2" @click="isAktivasiAbsen = !isAktivasiAbsen">
                                    <x-button-secondary type="button" iconNone="true" class="text-sm">Aktifkan Absen</x-button-secondary>
                                </a>
                                <a href="#" class="mr-2" @click.prevent="detailKelas = false; detailSiswa = true">
                                    <x-icon-admin icon="iconView" fill="#000"></x-icon-admin>
                                </a>
                                <a href="" class="mr-2">
                                    <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Rekap Absensi Siswa --}}
        <div x-show="detailSiswa" x-cloak class="bg-white shadow-md rounded-md p-6">
            <x-button-primary iconBeforeText="true" iconType="iconArrowLeft" class="mb-3" @click="detailKelas = !detailKelas, detailSiswa = !detailSiswa"></x-button-primary>
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Rekap Absensi Siswa</h1>
                    <p class="text-gray-500">Menampilkan seluruh data absen siswa</p>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari"
                    class="w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                    <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600" alt="Book Icon">
                </button>
            </div>

            <!-- Table -->
            <div class="rounded-lg">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-gray-700">
                            <th class="py-2 px-4 border-b text-start">Nama Siswa</th>
                            <th class="py-2 px-4 border-b text-center">Date</th>
                            <th class="py-2 px-4 border-b text-center">Time</th>
                            <th class="py-2 px-4 border-b text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        <tr>
                            <td class="py-2 px-4 border-b">Henry Carnegie</td>
                            <td class="py-2 px-4 border-b text-center">
                                2024-12-31
                            </td>
                            <td class="py-2 px-4 border-b text-center">
                                15:15
                            </td>
                            <td class="py-2 px-4 border-b text-center">
                                <template x-if="absenAktif">
                                    <span class="bg-green-200 text-green-800 px-2 py-1 text-sm rounded-lg">Hadir</span>
                                </template>
                                <template x-if="!absenAktif">
                                    <span class="bg-red-200 text-red-800 px-2 py-1 text-sm rounded-lg">Absen</span>
                                </template>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Abdi M.M</td>
                            <td class="py-2 px-4 border-b text-center">
                                2024-12-31
                            </td>
                            <td class="py-2 px-4 border-b text-center">
                                15:15
                            </td>
                            <td class="py-2 px-4 border-b text-center">
                                <template x-if="absenAktif">
                                    <span class="bg-green-200 text-green-800 px-2 py-1 text-sm rounded-lg">Hadir</span>
                                </template>
                                <template x-if="!absenAktif">
                                    <span class="bg-red-200 text-red-800 px-2 py-1 text-sm rounded-lg">Absen</span>
                                </template>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Popup Tambah Kelas -->
        <div x-show="isTambahKelas" x-cloak
            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative" @click.away="isTambahKelas = false">
                <!-- Close Button -->
                <button @click="isTambahKelas = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                    <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                </button>

                <!-- Popup Header -->
                <div class="flex items-center mb-4">
                    <h2 class="text-lg font-semibold">Tambah Kelas</h2>
                </div>

                <!-- Form -->
                <form>
                    <div class="mb-4">
                        <label for="kelas-name" class="block text-sm font-medium text-gray-700 mb-2">Nama Kelas</label>
                        <input id="kelas-name" type="text" placeholder="Masukkan nama kelas"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" />
                    </div>
                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Tambah Kelas
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Popup Tambah Absen -->
        <div x-show="isTambahAbsen" x-cloak
            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative" @click.away="isTambahAbsen = false">
                <!-- Close Button -->
                <button @click="isTambahAbsen = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                    <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                </button>

                <!-- Popup Header -->
                <div class="flex items-center mb-4">
                    <h2 class="text-lg font-semibold">Tambah Absensi</h2>
                </div>

                <!-- Form -->
                <form>
                    <div class="mb-4">
                        <label for="chapter-name" class="block text-sm font-medium text-gray-700 mb-2">Nama Chapter</label>
                        <input id="chapter-name" type="text" placeholder="Masukkan nama chapter"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" />
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Tambah Absensi
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Popup Aktifasi Absen -->
        <div x-show="isAktivasiAbsen" x-cloak
            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-80 text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-yellow-100 text-yellow-500 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m0-4h.01M12 8v.01M7 8c.66 0 1 .34 1 1 0 .66-.34 1-1 1H6c-.66 0-1-.34-1-1s.34-1 1-1h1zm0 6c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1H7zm10 0c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1h-1zm-4-6c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1h-1zm0 6c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1h-1z" />
                        </svg>
                    </div>
                </div>
                <!-- Message -->
                <p class="text-lg font-semibold mb-6">Apakah anda yakin ingin mengaktifkan absen ini ?</p>
                <div class="flex justify-center gap-4">
                    <button @click="absenAktif = true; isAktivasiAbsen = false; showModal = true"
                        class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-600">Ya
                    </button>
                    <button @click="isAktivasiAbsen = false"
                        class="bg-red-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-red-600">Tidak
                    </button>
                </div>
            </div>
        </div>
        <x-modal-verification
            xShow="showModal"
            verificationSuccess={{ $absenAktif }}
            textModal="Berhasil mengaktifkan Absen"
            textRedirect="Kembali"
            redirectSuccessRoute="admin.absensi"
            redirectFailureRoute="admin.absensi"
        ></x-modal-verification>
    </div>
</div>
