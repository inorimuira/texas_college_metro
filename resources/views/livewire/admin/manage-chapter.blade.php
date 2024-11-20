<div class="flex-1">
    <div class="w-full bg-white shadow p-6 flex justify-between items-center top-0">
        <div></div>
        <div class="flex items-center space-x-4">
            <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-2.21-1.79-4-4-4a4 4 0 00-8 0v3.159c0 .586-.208 1.133-.595 1.567L5 17h5m5 0a3.978 3.978 0 01-3-1m3 1a3.978 3.978 0 003-1m-6 1h6" />
                </svg>
            </button>
            <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A6.978 6.978 0 0112 15c1.757 0 3.36.63 4.621 1.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
            </button>
            <span class="text-gray-700 font-medium">Admin</span>
            <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>
    </div>
    <div class="flex-1 p-8">
        <div class="bg-white shadow-md rounded-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Manage Chapter</h1>
                    <p class="text-gray-500">Buat, hapus, dan edit soal</p>
                </div>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Tambah Chapter</button>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                    <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600" alt="Book Icon">
                </button>
            </div>

            <!-- Chapters -->
            <div class="relative">
                <div class="border rounded-md divide-y">
                    <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">Past Tense</h2>
                        <div class="flex space-x-2">
                            <button id="breakdown" class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <img src="{{ asset('assets/image/breakdownIcon.svg') }}" class="h-5 w-5" alt="Edit Pen Icon">
                            </button>
                            <button id="openPopupButtonDelete" class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <img src="{{ asset('assets/image/iconDelete.svg') }}" class="h-5 w-5" alt="Edit Pen Icon">
                            </button>
                        </div>
                    </div>
                </div>
                <div id="modul" class="border rounded-md divide-y">
                    <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100">
                        <span>Module 1</span>
                        <div class="flex space-x-2">
                            <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <img src="{{ asset('assets/image/iconEdit.svg') }}" class="h-5 w-5" alt="Edit Pen Icon">
                            </button>
                            <button id="openPopupButtonDelete" class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <img src="{{ asset('assets/image/iconDelete.svg') }}" class="h-5 w-5" alt="Edit Pen Icon">
                            </button>
                        </div>
                    </div>
                </div>
                <button class="mt-4 px-4 py-2 bg-blue-100 text-blue-600 rounded-md hover:bg-blue-200 transition">Tambah Module</button>
            </div>
        </div>
    </div>

    <script>
        const breakdown = document.getElementById('breakdown');
        const modul = document.getElementById('modul');

        breakdown.addEventListener('click', () => {
            modul.classList.toggle('hidden');
        });

        // Optional: Close the submenu when clicking outside
        document.addEventListener('click', (event) => {
            if (!breakdown.contains(event.target) && !modul.contains(event.target)) {
                modul.classList.add('hidden');
            }
        });
    </script>
</div>
