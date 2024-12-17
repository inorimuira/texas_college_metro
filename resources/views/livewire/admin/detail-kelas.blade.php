<div class="w-full"
    x-data="{
        isTambahMurid: @entangle('isTambahMurid'),
        selectAll: false,
        selectedUsers: @entangle('selectedUsers'),
        toggleAllCheckboxes() {
            this.selectAll = !this.selectAll;
            this.selectedUsers = this.selectAll ? @this.data.map(item => item.id) : [];
        }
        }">
    <div class="p-8">
        <div x-cloak class="bg-white shadow-md rounded-md p-6">
            <!-- Back Button-->
            <x-button-primary wire:navigate href="{{ route('admin.presensi') }}" iconBeforeText="true" iconType="iconArrowLeft" class="mb-3"></x-button-primary>

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Murid Kelas</h1>
                    <p class="text-gray-500">Kelola Murid Kelas</p>
                </div>
                <div @click="isTambahMurid = !isTambahMurid">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Tambah
                        Murid</button>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari Murid"
                    class="w-3/4 lg:w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Table -->
            <div class="rounded-lg">
                @if ($muridKelas->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="py-3 px-4 border border-gray-200 text-left w-1/2">Nama</th>
                                <th class="py-3 px-4 border border-gray-200 text-center w-1/4">Tingkat Pemahaman</th>
                                <th class="py-3 px-4 border border-gray-200 text-center w-1/4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-gray-600">
                            @forelse ($muridKelas as $item)
                                <tr>
                                    <td class="py-3 px-4 text-left">{{ $item->name }}</td>
                                    <td class="py-3 px-4 text-center">
                                        {{ $item->murid->tingkat_pemahaman ?? '-' }}
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <span wire:click="confirmDelete({{ $item->id }}, 'kelas')" class="mr-2 cursor-pointer">
                                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-3 px-4 text-center text-gray-500">
                                        Tidak ada data murid dalam kelas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @else
                    <div class="text-center p-4">
                        <p class="text-gray-600">Belum ada murid</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- modal tambah murid --}}
        <div x-show="isTambahMurid" x-cloak
            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-5 relative">
                <!-- Close Button -->
                <button wire:click="closeTambahMurid" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                    <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                </button>

                <!-- Popup Header -->
                <div class="flex items-center mb-4">
                    <h2 class="text-lg font-semibold">Tambah Murid</h2>
                </div>

                <!-- Search and Filter Form -->
                <div class="mb-4">
                    <div class="flex gap-2 items-end">
                        <div class="flex-grow">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Cari Murid</label>
                            <input
                                wire:model.live.debounce.500ms="search"
                                id="search"
                                type="text"
                                placeholder="Cari nama murid"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                            />
                        </div>

                        <div class="w-1/3">
                            <label for="filter" class="block text-sm font-medium text-gray-700 mb-2">Filter</label>
                            <select
                                wire:model.live.debounce.500ms="filter"
                                id="filter"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                            >
                                <option value="">Tingkat Pemahaman</option>
                                <option value="children">Children</option>
                                <option value="beginner 1">Beginner 1</option>
                                <option value="beginner 2">Beginner 2</option>
                                <option value="pre-elementary">Pre-elementary</option>
                                <option value="elementary">Elementary</option>
                                <option value="low intermediate">Low Intermediate</option>
                                <option value="high intermediate">High Intermediate</option>
                            </select>
                        </div>
                    </div>
                </div>
                {{-- end search and filter --}}

                <!-- User Selection Form -->
                <!-- Select All Checkbox -->
                <div class="flex items-center mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Murid</label>
                </div>
                <div class="flex items-center mb-4">
                    <button
                        wire:click="toggleSelectAll"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
                    >
                        {{ count($selectedUsers) === $data->count() ? 'Uncheck All' : 'Select All' }}
                    </button>
                </div>
                <form wire:submit.prevent="tambahMurid({{ $idKelas }})">

                    <!-- Checkbox List for Users -->
                    <div class="mb-4">
                        <div class="border border-gray-300 rounded-lg p-3 max-h-48 overflow-y-auto">

                            @if ($data->isEmpty())
                                <p class="text-center text-gray-600">Data tidak ditemukan atau murid belum mengikuti placement test.</p>
                            @else
                                @foreach ($data as $user)
                                    <div class="flex items-center mb-2">
                                        <input
                                            wire:model="selectedUsers"
                                            type="checkbox"
                                            value="{{ $user->id }}"
                                            id="selectedUsers{{ $user->id }}"
                                            class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded"
                                        />
                                        <label for="user_{{ $user->id }}" class="ml-2 text-sm text-gray-700 cursor-pointer">
                                            {{ $user->name }} - {{ $user->murid->tingkat_pemahaman }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    @error('selectedUsers')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Aktifasi
                        </button>
                    </div>
                </form>
                {{-- end user selection form --}}
            </div>
        </div>
    </div>
</div>
