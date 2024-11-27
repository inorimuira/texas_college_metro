<div class="w-full" x-data="{ isChapterOpen: false, isModuleOpen: false }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div  x-cloak class="bg-white shadow-md rounded-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Manage Soal</h1>
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
                            <button class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Manage Soal</button>
                            <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <img src="{{ asset('assets/image/iconDelete.svg') }}" class="h-5 w-5" alt="Delete Icon">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
