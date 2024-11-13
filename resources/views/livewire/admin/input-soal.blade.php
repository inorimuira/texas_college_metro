<div class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="flex gap-2 items-center justify-center mt-3">
                <img alt="Logo" class="w-10" height="40" src="{{ asset('assets/image/logo.png') }}" />
                <span class="text-black font-medium text-lg">Texas College Metro</span>
            </div>
            <nav class="mt-6">
                <a href="#" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 8h18M3 13h18M3 18h18" />
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V3H8v8H3v8h18v-8h-5z" />
                    </svg>
                    Pendaftaran
                </a>
                <a href="#" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m4-4H8" />
                    </svg>
                    Input Soal
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <!-- Topbar -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">Manage Soal</h1>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0018 15h-3v2zM9 7H7V5h2v2zM9 15H7v-2h2v2zm4 4h-4V3h4v16z" />
                        </svg>
                    </button>
                    <button>
                        <span class="text-gray-700 font-medium">Admin</span>
                    </button>
                </div>
            </div>

            <!-- Main Section -->
            <main class="p-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div id="tambahSoal" class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">Edit dan Hapus Soal</h3>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Tambah Soal</button>
                    </div>

                    <!-- Search Bar -->
                    <div class="flex items-center mb-4">
                        <input type="text" placeholder="Cari" class="px-4 py-2 border rounded-l-lg w-full">
                        <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                            <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600" alt="Book Icon">
                        </button>
                    </div>

                    <!-- Table -->
                    <table class="w-full text-left border">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="p-4 border text-gray-600">Kode Soal</th>
                                <th class="p-4 border text-gray-600">Mata Pelajaran</th>
                                <th class="p-4 border text-gray-600">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-4 border">Pretest-1</td>
                                <td class="p-4 border">Pre test</td>
                                <td class="p-4 border text-center">
                                    <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                        <img src="{{ asset('assets/image/iconEdit.svg') }}" class="h-5 w-5" alt="Edit Pen Icon">
                                    </button>
                                    <button id="openPopupButtonDelete" class="text-yellow-500 hover:text-yellow-700 mr-2">
                                        <img src="{{ asset('assets/image/iconDelete.svg') }}" class="h-5 w-5" alt="Edit Pen Icon">
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Popup Background -->
    <div id="popupTambahSoal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <!-- Popup Container -->
        <div class="bg-white w-80 p-6 rounded-lg shadow-lg">
            <h2 class="text-center font-semibold text-lg mb-4">Tambah Soal</h2>
            <!-- Mata Pelajaran Input -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Mata Pelajaran</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Masukkan mata pelajaran">
            </div>
            <!-- Kode Soal Input -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-1">Kode Soal</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Masukkan kode soal">
            </div>
            <!-- Buttons -->
            <div class="flex justify-center space-x-3">
                <button class="px-4 py-2 mr-3 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Soal</button>
                <button id="closeTambahSoal" class="px-4 py-2 mr-3 bg-gray-200 text-gray-700 rounded hover:bg-gray-300" onclick="togglePopup()">Batal</button>
            </div>
        </div>
    </div>

    <div id="popupDelete" class="fixed inset-0 flex items-center justify-center bg-opacity-50 hidden bg-gray-200">
        <!-- Popup Container -->
        <div class="bg-white rounded-lg shadow-lg p-6 w-80 text-center">
          <!-- Icon -->
          <div class="flex justify-center mb-4">
            <div class="bg-yellow-100 text-yellow-500 rounded-full p-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m0-4h.01M12 8v.01M7 8c.66 0 1 .34 1 1 0 .66-.34 1-1 1H6c-.66 0-1-.34-1-1s.34-1 1-1h1zm0 6c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1H7zm10 0c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1h-1zm-4-6c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1h-1zm0 6c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1h-1z" />
              </svg>
            </div>
          </div>
          <!-- Message -->
          <p class="text-lg font-semibold mb-6">Apakah Anda Yakin Ingin Menghapus Soal Ini !</p>
          <!-- Buttons -->
          <div class="flex justify-center gap-4">
            <button id="yaDelete" class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-600">Ya</button>
            <button id="tidakDelete" class="bg-red-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-red-600">Tidak</button>
          </div>
        </div>
    </div>

    <script>
        const tambahSoal = document.getElementById('tambahSoal');
        const closeTambahSoal = document.getElementById('closeTambahSoal');
        const popupTambahSoal = document.getElementById('popupTambahSoal');

        // Event listener untuk membuka popup
        tambahSoal.addEventListener('click', () => {
            popupTambahSoal.classList.remove('hidden');
        });

        // Event listener untuk menutup popup
        closeTambahSoal.addEventListener('click', () => {
            popupTambahSoal.classList.add('hidden');
        });

        // Menutup popup saat klik di luar popup
        window.addEventListener('click', (e) => {
            if (e.target === popupTambahSoal) {
                popupTambahSoal.classList.add('hidden');
            }
        });

        // Mendapatkan elemen tombol dan popup
        const openPopupButtonDelete = document.getElementById('openPopupButtonDelete');
        const tidakDelete = document.getElementById('tidakDelete');
        const popupDelete = document.getElementById('popupDelete');

        // Event listener untuk membuka popup
        openPopupButtonDelete.addEventListener('click', () => {
            popupDelete.classList.remove('hidden');
        });

        // Event listener untuk menutup popup
        tidakDelete.addEventListener('click', () => {
            popupDelete.classList.add('hidden');
        });

        // Menutup popup saat klik di luar popup
        window.addEventListener('click', (e) => {
            if (e.target === popupDelete) {
                popupDelete.classList.add('hidden');
            }
        });
    </script>
</div>
