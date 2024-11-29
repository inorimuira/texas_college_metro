<div class="w-full" x-data="{ isChapterOpen: false, isModuleOpen: false }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div x-show="!isModuleOpen" class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Bank Soal</h1>
                    <p class="text-gray-500">Edit chapter dan modul</p>
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

            <!-- Chapters -->
            <div class="flex flex-col border rounded-md divide-y">
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                    @click="isChapterOpen = !isChapterOpen">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Chapter 1 - Past Tense</h2>
                    <div class="flex space-x-2">
                        <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                            <template x-if="isChapterOpen">
                                <x-icon-admin icon="iconDropdownCollapse" fill="#000"></x-icon-admin>
                            </template>
                            <template x-if="!isChapterOpen">
                                <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                            </template>
                        </button>
                    </div>
                </div>
                <div class="" x-show="isChapterOpen" x-cloak>
                    <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                        <span class="ps-6">Module 1</span>
                        <div class="flex space-x-2">
                            <button class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
                                @click="isModuleOpen = !isModuleOpen">Kelola Soal</button>
                            <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Soal Section -->
        <div x-show="isModuleOpen" class="bg-white shadow-md rounded-md p-6" x-cloak>
            <x-button-primary iconBeforeText="true" iconType="iconArrowLeft" class="mb-3"
                        @click="isModuleOpen = !isModuleOpen"></x-button-primary>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Kelola Soal</h1>
                    <p class="text-gray-500">Buat, hapus, dan edit soal</p>
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

            <!-- Soal -->
            <div class="flex flex-col border rounded-md divide-y mb-4" x-data="{ isModalSoalOpen: false }">
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer rounded-t-md"
                    :class="{ 'bg-transparent': !isModalSoalOpen, 'bg-slate-700 hover:bg-slate-800': isModalSoalOpen }"
                    @click="isModalSoalOpen = !isModalSoalOpen">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2"
                        :class="{ 'text-white': isModalSoalOpen }">
                        Modul 1
                    </h2>
                    <div class="flex space-x-2">
                        <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                            <template x-if="isModalSoalOpen">
                                <x-icon-admin icon="iconDropdownCollapse" fill="#fff"></x-icon-admin>
                            </template>
                            <template x-if="!isModalSoalOpen">
                                <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                            </template>
                        </button>
                    </div>
                </div>
                <!-- Konten Soal -->
                <div x-show="isModalSoalOpen" x-cloak>
                    <!-- Soal 1 -->
                    <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                        <span class="ps-6">Soal 1</span>
                        <div class="flex space-x-2">
                            <button class="text-red-500 hover:text-red-700 mr-2">
                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                            </button>
                        </div>
                    </div>
                    <!-- Soal 2 -->
                    <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                        <span class="ps-6">Soal 2</span>
                        <div class="flex space-x-2">
                            <button class="text-red-500 hover:text-red-700 mr-2">
                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                            </button>
                        </div>
                    </div>
                    <!-- Soal 3 -->
                    <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                        <span class="ps-6">Soal 3</span>
                        <div class="flex space-x-2">
                            <button class="text-red-500 hover:text-red-700 mr-2">
                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                            </button>
                        </div>
                    </div>
                    <!-- Tombol Tambah Soal -->
                    <div class="flex justify-center px-4 py-2">
                        <x-button-primary type="button" iconNone="true" class="text-sm">Tambah Soal</x-button-primary>
                    </div>
                </div>
            </div>

            <!-- Soal -->
            <div class="flex flex-col border rounded-md divide-y mb-4" x-data="{ isModalSoalOpen: false }">
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer rounded-t-md"
                    :class="{ 'bg-transparent': !isModalSoalOpen, 'bg-slate-700 hover:bg-slate-800': isModalSoalOpen }"
                    @click="isModalSoalOpen = !isModalSoalOpen">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2"
                        :class="{ 'text-white': isModalSoalOpen }">
                        Modul 2
                    </h2>
                    <div class="flex space-x-2">
                        <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                            <template x-if="isModalSoalOpen">
                                <x-icon-admin icon="iconDropdownCollapse" fill="#fff"></x-icon-admin>
                            </template>
                            <template x-if="!isModalSoalOpen">
                                <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                            </template>
                        </button>
                    </div>
                </div>
                <!-- Konten Soal -->
                <div x-show="isModalSoalOpen" x-cloak>
                    <!-- Soal 1 -->
                    <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                        <span class="ps-6">Soal 1</span>
                        <div class="flex space-x-2">
                            <button class="text-red-500 hover:text-red-700 mr-2">
                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                            </button>
                        </div>
                    </div>
                    <!-- Soal 2 -->
                    <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                        <span class="ps-6">Soal 2</span>
                        <div class="flex space-x-2">
                            <button class="text-red-500 hover:text-red-700 mr-2">
                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                            </button>
                        </div>
                    </div>
                    <!-- Soal 3 -->
                    <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                        <span class="ps-6">Soal 3</span>
                        <div class="flex space-x-2">
                            <button class="text-red-500 hover:text-red-700 mr-2">
                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                            </button>
                        </div>
                    </div>
                    <!-- Tombol Tambah Soal -->
                    <div class="flex justify-center px-4 py-2">
                        <x-button-primary type="button" iconNone="true" class="text-sm">Tambah Soal</x-button-primary>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
