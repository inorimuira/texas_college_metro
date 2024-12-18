<div class="w-full" x-data="{ isPreviewMurid: @entangle('isPreviewMurid')}">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Data Murid Lama</h1>
                    <p class="text-gray-500">Kumpulan seluruh data murid</p>
                </div>
                <div>
                    <x-button-secondary type="button" iconNone="true" class="text-sm">Export</x-button-secondary>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input wire:model.live.debounce.500ms="search" type="text" placeholder="Cari"
                    class="w-3/4 lg:w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Table Data Murid -->
            @if ($data->isEmpty())
                <p class="text-center text-gray-600">Tidak Ada Data</p>
            @else
                <table class="w-full table-auto" x-data="{  }">
                    <thead>
                        <tr class="bg-primary-300">
                            <th class="px-4 py-2 border">Nama Lengkap</th>
                            <th class="px-4 py-2 border">NIK/NISN</th>
                            <th class="px-4 py-2 border">Asal Sekolah</th>
                            <th class="px-4 py-2 border">Program</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="px-4 py-3 border text-center text-sm">{{ $item->nama }}</td>
                                <td class="px-4 py-3 border text-center text-sm">{{ $item->nik_nisn }}</td>
                                <td class="px-4 py-3 border text-center text-sm">{{ $item->asal_sekolah }}</td>
                                <td class="py-3 border text-center text-sm">
                                    @if ($item->program == "Reguler")
                                        <span class="px-4 py-2 bg-primary-1100 text-sm text-white font-semibold rounded-full">Reguler</span>
                                    @else
                                        <span class="px-4 py-2 bg-highlight text-sm text-slate-700 font-semibold rounded-full">Unggulan</span>
                                    @endif
                                </td>
                                <td class="py-3 border text-center space-x-1">
                                    <button wire:click="selectStudent('{{ $item->id }}')">
                                        <x-icon-admin icon="iconView" fill="#000"></x-icon-admin>
                                    </button>
                                    <button wire:click="confirmDelete({{ $item->id }})" class="text-red-500 hover:text-red-700">
                                        <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            @if ($muridPreview)
                <div x-show="isPreviewMurid" x-transition x-cloak
                    class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-max p-5 relative" @click.away="isPopupEditSummary = false">
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
                                <span class="text-base font-normal text-gray-600">: {{ $item->nama }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                Email
                                <span class="text-base font-normal text-gray-600">: {{ $item->email }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                Program
                                <span class="text-base font-normal text-gray-600">: {{ $item->program }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                Tingkat Pemahaman
                                <span class="text-base font-normal text-gray-600">: {{ $item->tingkat_pemahaman }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                No. Whatsapp
                                <a href="https://wa.me/6289514137752" class="text-base font-normal text-indigo-500">:
                                    {{ $item->nomor_whatsapp }}</a>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                Tanggal Lahir
                                <span class="text-base font-normal text-gray-600">: {{ $item->tgl_lahir }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                NIK/NISN
                                <span class="text-base font-normal text-gray-600">: {{ $item->nik_nisn }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                Asal Sekolah
                                <span class="text-base font-normal text-gray-600">: {{ $item->asal_sekolah }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                Nama Ayah
                                <span class="text-base font-normal text-gray-600">: {{ $item->nama_ayah }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                Nama Ibu
                                <span class="text-base font-normal text-gray-600">: {{ $item->nama_ibu }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                Pekerjaan Ayah
                                <span class="text-base font-normal text-gray-600">: {{ $item->pekerjaan_ayah }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                Pekerjaan Ibu
                                <span class="text-base font-normal text-gray-600">: {{ $item->pekerjaan_ibu }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                Alamat Domisili
                                <span class="text-base font-normal text-gray-600">: {{ $item->alamat_domisili }}</span>
                            </span>

                            <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                                Alamat Sekolah
                                <span class="text-base font-normal text-gray-600">: {{ $item->alamat_sekolah }}</span>
                            </span>

                        </div>
                        {{-- <div class="flex justify-end mt-3">
                            <x-button-primary iconNone="true">Edit</x-button-primary>
                        </div> --}}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
