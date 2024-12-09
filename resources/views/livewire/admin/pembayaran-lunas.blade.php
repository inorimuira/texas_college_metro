<div class="w-full" x-data="{ isPreviewMurid: false, kelasUnggulan: true, kelasReguler: false, statusPembayaran: false }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Pembayaran Lunas</h1>
                    <p class="text-gray-500">Kelola seluruh pembayaran lunas</p>
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
                        <th class="px-4 py-2 border">Program</th>
                        <th class="px-4 py-2 border">Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr class="">
                        <td class="px-4 py-3 border text-center text-sm">Satria Fattan G.</td>
                        <td class="px-4 py-3 border text-center text-sm">3671092107030002</td>
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
                            <template x-if="statusPembayaran">
                                <span class="px-4 py-2 bg-emerald-200 text-sm text-emerald-800 font-semibold rounded-full">
                                    Lunas
                                </span>
                            </template>
                            <template x-if="!statusPembayaran">
                                <span class="px-4 py-2 bg-amber-200 text-sm text-amber-800 font-semibold rounded-full">
                                    Belum Lunas
                                </span>
                            </template>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
