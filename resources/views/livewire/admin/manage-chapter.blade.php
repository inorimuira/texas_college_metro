<div class="w-full" x-data="{ isChapterOpen: false, isModuleOpen: false, isManagingModule: false }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div x-show="!isManagingModule" x-cloak class="bg-white shadow-md rounded-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Manage Chapter</h1>
                    <p class="text-gray-500">Buat, hapus, dan edit soal</p>
                </div>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Tambah Chapter</button>
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
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer" @click="isChapterOpen = !isChapterOpen">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Chapter 1 - Past Tense</h2>
                    <div class="flex space-x-2">
                        <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                            <img src="{{ asset('assets/image/breakdownIcon.svg') }}" class="h-5 w-5" alt="Breakdown Icon">
                        </button>
                    </div>
                </div>
                <div class="" x-show="isChapterOpen" x-cloak>
                    <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                        <span class="ps-6">Module 1</span>
                        <div class="flex space-x-2">
                            <button class="text-yellow-500 hover:text-yellow-700 mr-2"
                                @click="isManagingModule = !isManagingModule">
                                <img src="{{ asset('assets/image/iconEdit.svg') }}" class="h-5 w-5" alt="Edit Pen Icon">
                            </button>
                            <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <img src="{{ asset('assets/image/iconDelete.svg') }}" class="h-5 w-5" alt="Delete Icon">
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-center py-3">
                        <x-button-primary iconNone="true">Tambah Module</x-button-primary>
                    </div>
                </div>
            </div>
        </div>
        @php
            $textSummary = "Ini merupakan rangkuman untuk module pembelajaran yang akan ditampilkan kepada siswa pada saat masuk ke module ini. Jelaskan isi dari module ini disini atau bisa juga dengan memberikan rangkuman dalam bentuk teks panjang disini"
        @endphp
        <!-- Manage Module Section -->
        <div x-show="isManagingModule" x-cloak class="bg-white shadow-md rounded-md p-6">
            <x-button-primary iconBeforeText="true" iconType="iconArrowLeft" class="mb-3" @click="isManagingModule = !isManagingModule"></x-button-primary>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Manage Module 1</h1>
                </div>
            </div>
            <span class="text-base font-medium">Summary : </span>
            <span class="">{{ $textSummary }}</span>
            <form class="flex flex-col gap-3">
                <textarea name="" class="min-h-10 items-start bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-slate-400"></textarea>
                <div class="flex justify-end">
                    <x-button-secondary type="submit" iconNone="true">Save Summary</x-button-secondary>
                </div>
            </form>

            <!-- Modules -->
            <div class="flex flex-col border rounded-md divide-y mt-4">
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Video 1</h2>
                    <div class="flex space-x-2">
                        <button class="text-yellow-500 hover:text-yellow-700 mr-2"
                            @click="isModuleOpen = !isModuleOpen">
                            <img src="{{ asset('assets/image/breakdownIcon.svg') }}" class="h-5 w-5" alt="Breakdown Icon">
                        </button>
                        <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                            <img src="{{ asset('assets/image/iconDelete.svg') }}" class="h-5 w-5" alt="Delete Icon">
                        </button>
                    </div>
                </div>
                <div class="" x-show="isModuleOpen" x-cloak>
                    <div class="flex flex-col px-4 py-2 border-b hover:bg-gray-100">
                        <div class="flex gap-1 ps-4">
                            <span class="font-medium">Judul Video :</span>
                            <span class="">Introduction to Past Tense</span>
                        </div>
                        <div class="flex gap-1 ps-4">
                            <span class="font-medium">Link Video :</span>
                            <a class="text-primary-1100" href="www.youtube.com">link to youtube video</a>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center py-3">
                    <x-button-primary iconNone="true">Tambah Aktifitas</x-button-primary>
                </div>
            </div>
        </div>
    </div>
</div>
