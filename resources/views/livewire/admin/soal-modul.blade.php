<div class="w-full" x-data="{ isChapterOpen: false, isManagingModule: false, isPopupOpen: false }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div x-show="!isManagingModule" x-cloak class="bg-white shadow-md rounded-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-xl font-bold text-gray-800">Bank Soal - Modul 1</h1>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari"
                    class="w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Chapters -->
            <div class="flex flex-col border rounded-md divide-y">
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                    @click="isChapterOpen = !isChapterOpen">
                    <h2 class="text-lg font-semibold text-gray-800">Modul</h2>
                    <div class="flex space-x-2">
                        <button class="text-yellow-500 hover:text-yellow-700">
                            <img src="{{ asset('assets/image/breakdownIcon.svg') }}" class="h-5 w-5" alt="Breakdown Icon" loading="lazy">
                        </button>
                    </div>
                </div>
                <div x-show="isChapterOpen" x-cloak>
                    <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                        <span class="pl-6">Soal 1</span>
                    </div>
                    <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                        <span class="pl-6">Soal 2</span>
                    </div>
                    <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                        <span class="pl-6">Soal 3</span>
                    </div>
                    <div class="flex justify-center py-3">
                        <button @click="isPopupOpen = true"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            Tambah Soal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup Tambah Soal -->
    <div x-show="isPopupOpen" x-cloak class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg mx-4 p-6">
            <!-- Header -->
            <h1 class="text-lg font-semibold mb-2">Tambah Soal</h1>
            <h2 class="text-gray-700 font-medium mb-4">Pertanyaan</h2>

            <!-- Question Content -->
            <textarea placeholder="Tulis pertanyaan di sini"
                class="border border-gray-300 rounded-lg p-4 mb-4 w-full text-gray-600"></textarea>

            <!-- Answer Options -->
            <h3 class="text-gray-700 font-medium mb-2">Jawaban</h3>
            <form>
                <template x-for="(option, index) in ['A', 'B', 'C', 'D']" :key="index">
                    <div class="flex items-center mb-3">
                        <input type="radio" :id="'option' + option" name="answer"
                            class="mr-2 text-blue-500 focus:ring-blue-400">
                        <label :for="'option' + option" class="flex-1 flex items-center">
                            <span class="w-6 font-bold" x-text="option"></span>
                            <input type="text" placeholder="Jawaban"
                                class="border border-gray-300 rounded-lg px-3 py-1 w-full">
                        </label>
                    </div>
                </template>

                <!-- Save and Cancel Buttons -->
                <div class="flex justify-end space-x-2">
                    <button @click="isPopupOpen = false" type="button"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                        Batal
                    </button>
                    <button type="button" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                        Simpan Soal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
