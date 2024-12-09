<div class="w-full"
    x-data="{
        isPreviewMurid: false,
        kelasUnggulan: true,
        kelasReguler: false,
        gradeMurid: {
            children1: false,
            children2: false,
            children3: false,
            introduction: false,
            beginner1: false,
            beginner2: true
        }
    }"
    >
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Sertifikat</h1>
                    <p class="text-gray-500">Manage seluruh sertifikat murid</p>
                </div>
                <div class="">
                    <x-button-secondary type="button" iconNone="true" class="text-sm">Export</x-button-secondary>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center mb-4 relative">
                <input type="text" placeholder="Cari" wire:model.live.debounce.500ms="search"
                    class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 pr-10 transition duration-200 ease-in-out" />

            </div>

            <!-- Table Data Murid -->
            <table class="w-full table-auto">
                <thead class="">
                    <tr class="bg-primary-300">
                        <th class="px-4 py-2 border">Nama Lengkap</th>
                        <th class="px-4 py-2 border">Program</th>
                        <th class="px-4 py-2 border">Kelas</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr class="">
                        <td class="px-4 py-3 border text-center text-sm">Satria Fattan G.</td>
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
                            <template x-if="gradeMurid.children1">
                                <span class="px-4 py-2 bg-cyan-100 text-cyan-700 text-sm font-semibold rounded-full">
                                    Children 1
                                </span>
                            </template>
                            <template x-if="gradeMurid.children2">
                                <span
                                    class="px-4 py-2 bg-yellow-100 text-yellow-700 text-sm font-semibold rounded-full">
                                    Children 2
                                </span>
                            </template>
                            <template x-if="gradeMurid.children3">
                                <span class="px-4 py-2 bg-green-100 text-green-700 text-sm font-semibold rounded-full">
                                    Children 3
                                </span>
                            </template>
                            <template x-if="gradeMurid.introduction">
                                <span
                                    class="px-4 py-2 bg-orange-100 text-orange-700 text-sm font-semibold rounded-full">
                                    Introduction
                                </span>
                            </template>
                            <template x-if="gradeMurid.beginner1">
                                <span
                                    class="px-4 py-2 bg-purple-100 text-purple-700 text-sm font-semibold rounded-full">
                                    Beginner 1
                                </span>
                            </template>
                            <template x-if="gradeMurid.beginner2">
                                <span class="px-4 py-2 bg-red-100 text-red-700 text-sm font-semibold rounded-full">
                                    Beginner 2
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
                        <h2 class="text-lg md:text-xl font-bold">Sertifikat Murid</h2>
                    </div>

                    <!-- Field Sertifikat -->
                    <div class="w-full flex flex-col">
                        <span class="w-96 h-96 border border-slate-800 flex justify-center items-center">
                            sertifikat
                        </span>
                    </div>
                    <div class="flex justify-center mt-3">
                        <x-button-primary iconType="iconDownload" iconBeforeText="true" class="text-sm">Download</x-button-primary>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
