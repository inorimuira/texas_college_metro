<div class="w-full"
    x-data="{ detailKelas: @entangle('detailKelas'), detailMurid:false, absenAktif: false, isTambahKelas: @entangle('isTambahKelas'), isTambahPresensi: @entangle('isTambahPresensi'), isAktifasiPresensi: @entangle('isAktifasiPresensi')}">
    <div class="p-8">
        {{-- Default --}}
        <div x-show="!detailKelas && !detailMurid" x-cloak class="bg-white shadow-md rounded-md p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Kelola Kelas</h1>
                    <p class="text-gray-500">Kelola seluruh kelas untuk absen murid</p>
                </div>
                <div @click="isTambahKelas = !isTambahKelas">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Tambah
                        Kelas</button>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari Kelas"
                    class="w-3/4 lg:w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Table -->
            <div class="rounded-lg">
                @if ($kelas->isNotEmpty())
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="text-gray-700">
                                <th class="py-2 px-4 border-b w-3/4 text-start">Kelas</th>
                                <th class="py-2 px-4 border-b w-1/4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                                @foreach ($kelas as $item)
                                    <tr>
                                        <td class="py-2 px-4 border-b w-3/4">{{ $item->nama_kelas }}</td>
                                        <td class="py-2 px-4 border-b w-full flex items-center justify-center">
                                            <a class="mr-2" wire:click="Kelas({{ $item->id }})">
                                                <x-button-secondary type="button" iconNone="true" class="text-sm">Manage Presensi</x-button-secondary>
                                            </a>
                                            <a class="mr-2" wire:navigate href="{{ route('admin.detailKelas', ['idKelas' => $item->id]) }}">
                                                <x-button-secondary type="button" iconNone="true" class="text-sm">Detail Kelas</x-button-secondary>
                                            </a>
                                            <span wire:click="confirmDelete({{ $item->id }}, 'kelas')" class="mr-2 cursor-pointer">
                                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center p-4">
                        <p class="text-gray-600">Belum ada kelas</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Detail Chapter --}}
        <div x-show="detailKelas && !detailMurid" x-cloak class="bg-white shadow-md rounded-md p-6">
            <x-button-primary iconBeforeText="true" iconType="iconArrowLeft" class="mb-3" @click="detailKelas = !detailKelas"></x-button-primary>
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Kelola Presensi</h1>
                    <p class="text-gray-500">Kelola seluruh absen murid</p>
                </div>
                <div @click="isTambahPresensi = true">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        Tambah Presensi
                    </button>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari Module"
                    class="w-3/4 lg:w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Table -->
            <div class="rounded-lg overflow-x-auto">
                    @if($presensis != null)
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="text-gray-700">
                                <th class="py-2 px-4 border-b w-2/4 text-start">Module</th>
                                <th class="py-2 px-4 border-b w-1/4 text-center">Status Presensi</th>
                                <th class="py-2 px-4 border-b w-1/4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @foreach ($presensis as $presensi)
                                    <tr>
                                        <td class="py-2 px-4 border-b w-2/4">{{ $presensi->module->nama_module }}</td>
                                        <td class="py-2 px-4 border-b w-1/4 text-center">
                                            @if ($presensi->status == 1)
                                                <span class="bg-green-200 text-green-800 px-2 py-1 text-sm rounded-lg">Aktif</span>
                                            @else
                                                <span class="bg-red-200 text-red-800 px-2 py-1 text-sm rounded-lg">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b w-full flex items-center justify-center">
                                            <span class="mr-2 cursor-pointer" wire:click="modalAktifasiPresensi({{ $presensi->id }}, 'edit')">
                                                <x-icon-admin icon="iconEdit" fill="#000" @click="absenAktif = !absenAktif"></x-icon-admin>
                                            </span>
                                            <a href="#" class="mr-2" @click.prevent="detailKelas = false; detailMurid = true">
                                                <x-icon-admin icon="iconView" fill="#000"></x-icon-admin>
                                            </a>
                                            <span wire:click="confirmDelete({{ $presensi->id }}, 'presensi')" class="mr-2 cursor-pointer">
                                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                            </span>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="text-center p-4">
                            <p class="text-gray-600">Belum ada presensi</p>
                        </div>
                    @endif
            </div>
        </div>

        {{-- Rekap Presensi Murid --}}
        <div x-show="detailMurid" x-cloak class="bg-white shadow-md rounded-md p-6">
            <x-button-primary iconBeforeText="true" iconType="iconArrowLeft" class="mb-3" @click="detailKelas = !detailKelas, detailMurid = !detailMurid"></x-button-primary>
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Rekap Presensi Murid</h1>
                    <p class="text-gray-500">Menampilkan seluruh data absen murid</p>
                </div>

                <div @click="isMurid = true">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        Tambah Murid
                    </button>
                </div>
            </div>

            <!-- Search bar -->

            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari"
                    class="w-3/4 lg:w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Table -->
            <div class="rounded-lg overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-gray-700">
                            <th class="py-2 px-4 border-b text-start">Nama Murid</th>
                            <th class="py-2 px-4 border-b text-center">Date</th>
                            <th class="py-2 px-4 border-b text-center">Time</th>
                            <th class="py-2 px-4 border-b text-center">Status</th>
                            <th class="py-2 px-4 border-b text-center">Aksi</th>
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
                            <td class="py-2 px-4 border-b">
                                <span class="flex justify-center cursor-pointer">
                                    <x-icon-admin icon="iconEdit" fill="#000" @click="absenAktif = !absenAktif"></x-icon-admin>
                                </span>
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
                            <td class="py-2 px-4 border-b">
                                <span class="flex justify-center cursor-pointer">
                                    <x-icon-admin icon="iconEdit" fill="#000" @click="absenAktif = !absenAktif"></x-icon-admin>
                                </span>
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
                <form wire:submit.prevent="tambahKelas">
                    <div class="mb-4">
                        <label for="nama_kelas" class="block text-sm font-medium text-gray-700 mb-2">Nama Kelas</label>
                        <input wire:model="nama_kelas" id="nama_kelas" type="text" placeholder="Masukkan nama kelas"
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
        <div x-show="isTambahPresensi" x-cloak
            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative"">
                <!-- Close Button -->
                <button @click="isTambahPresensi = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                    <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                </button>

                <!-- Popup Header -->
                <div class="flex items-center mb-4">
                    <h2 class="text-lg font-semibold">Tambah Presensi</h2>
                </div>

                <!-- Form -->
                <form wire:submit.prevent="tambahPresensi({{ ($selectedKelas ? $selectedKelas->id : '') }})">
                    <div x-data="{
                        chapters: @entangle('chapters'),
                        modules: @js($modules), // Data dari server
                        chapter_id: @entangle('chapter_id'),
                        module_id: @entangle('module_id'),
                        filteredModules: [],
                        setModules() {
                            console.log('Initial Modules:', this.modules); // Log data awal untuk debugging
                            if (this.chapter_id) {
                                this.filteredModules = this.modules.filter(module => module.chapter_id == this.chapter_id);
                                console.log('Chapter ID Terpilih:', this.chapter_id);
                                console.log('Filtered Modules:', this.filteredModules);
                            } else {
                                this.filteredModules = [];
                                console.log('No chapter selected, filteredModules kosong.');
                            }
                        }
                    }" x-init="setModules" x-watch="chapter_id" @change="setModules">

                        <!-- Chapter Dropdown -->
                        <div class="mb-4">
                            <label for="chapter" class="block text-sm font-medium text-gray-700 mb-2">Nama Chapter</label>
                            <select wire:model="chapter_id" x-model="chapter_id" id="chapter" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300">
                                <option value="">Pilih chapter</option>
                                <template x-for="(chapter, id) in chapters" :key="id">
                                    <option :value="id" x-text="chapter"></option>
                                </template>
                            </select>
                        </div>

                        <!-- Modul Dropdown -->
                        <div x-show="chapter_id" class="mb-4">
                            <label for="module" class="block text-sm font-medium text-gray-700 mb-2">Nama Modul</label>
                            <select wire:model="module_id" x-model="module_id" id="module" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300">
                                <option value="">Pilih modul</option>
                                <template x-for="module in filteredModules" :key="module.id">
                                    <option :value="module.id" x-text="module.name"></option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Tambah Presensi
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Popup Aktifasi Absen -->
        <div x-show="isAktifasiPresensi" x-cloak
            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative" @click.away="isAktifasiPresensi = false">
                <!-- Close Button -->
                <button @click="isAktifasiPresensi = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                    <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                </button>

                <!-- Popup Header -->
                <div class="flex items-center mb-4">
                    <h2 class="text-lg font-semibold">Aktifasi Presensi</h2>
                </div>

                <!-- Form -->
                <form wire:submit.prevent="aktifasiPresensi({{ $idPresensi }})">
                    <div class="mb-4">
                        <label for="waktu_presensi" class="block text-sm font-medium text-gray-700 mb-2">Waktu Presensi di Tutup</label>
                        <input
                            wire:model="waktu_presensi"
                            id="waktu_presensi"
                            type="datetime-local"
                            min="{{ now()->format('Y-m-d\TH:i') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                        />
                    </div>

                    @error('waktu_presensi')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status Presensi</label>
                        <select
                            wire:model="status"
                            id="status"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                        >
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>

                    @error('status')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Aktifasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
