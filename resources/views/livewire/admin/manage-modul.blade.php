<div class="flex-1">
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
        <!-- Content -->
        <main class="flex-1 p-12">
            <header class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Kelola Module 1</h1>
                <p class="text-gray-600">Buat hapus dan edit soal</p>
            </header>

            <!-- Summary Section -->
            <section class="mb-6">
                <h2 class="text-lg font-semibold text-gray-700">Summary</h2>
                <textarea
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="4"
                    placeholder="Lorem ipsum dolor sit amet..."></textarea>
                <button class="mt-3 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Edit Summary</button>
            </section>

            <!-- Videos Section -->
            <section class="mb-6">
                <h2 class="text-lg font-semibold text-gray-700">Video 1</h2>
                <div class="bg-white p-4 border border-gray-300 rounded-lg shadow-sm mt-2 flex justify-between items-center">
                    <div>
                        <p class="font-semibold text-gray-800">Nama: Introduction to Past Tense</p>
                        <p>Link: <a href="https://www.youtube.com" class="text-blue-600 underline" target="_blank">www.youtube.com</a></p>
                    </div>
                    <button class="text-red-600 hover:text-red-800">🗑 Delete</button>
                </div>

                <h2 class="text-lg font-semibold text-gray-700 mt-6">Video 2</h2>
                <div class="bg-white p-4 border border-gray-300 rounded-lg shadow-sm mt-2">
                    <p class="text-gray-600">No video available</p>
                </div>
            </section>

            <!-- Reading Section -->
            <section>
                <h2 class="text-lg font-semibold text-gray-700">Reading</h2>
                <textarea
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="10"
                    placeholder="Lorem ipsum dolor sit amet..."></textarea>
            </section>
        </main>
    </div>
</div>
