<div class="flex-1 p-10" x-data="{ isPopupOpen: false, isPopupOpen2: false }">
    <div>
        <!-- Header -->
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-xl font-bold text-gray-800">Manage Absen</h1>
            </div>
            <button @click="isPopupOpen = true" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Tambah Absen
            </button>
        </div>

        <!-- Search bar -->
        <div class="flex items-center space-x-2 p-4">
            <input type="text" placeholder="Cari"
                class="w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600" alt="Book Icon">
            </button>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <table class="w-full text-left table-auto">
                <thead>
                    <tr class="text-gray-600">
                        <th class="py-2 px-4 border-b">Chapter</th>
                        <th class="py-2 px-4 border-b">Status Akun</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr>
                        <td class="py-2 px-4 border-b">Chapter 1</td>
                        <td class="py-2 px-4 border-b">
                            <span class="px-2 py-1 bg-orange-200 text-orange-700 rounded-full text-xs">Aktif</span>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <img src="{{ asset('assets/image/iconMata.png') }}" class="h-5 w-5" alt="Mata Icon">
                            </button>
                            <button @click="isPopupOpen2 = true" class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <img src="{{ asset('assets/image/iconEdit.svg') }}" class="h-5 w-5" alt="Edit Icon">
                            </button>
                            <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <img src="{{ asset('assets/image/iconDelete.svg') }}" class="h-5 w-5" alt="Delete Icon">
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Popup Tambah Absen -->
    <div x-show="isPopupOpen" x-cloak class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <!-- Popup Container -->
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative">
            <!-- Close Button -->
            <button @click="isPopupOpen = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                <span class="material-icons">close</span>
            </button>

            <!-- Popup Header -->
            <div class="flex items-center mb-4">
                <h2 class="text-lg font-semibold">Tambah Absensi</h2>
            </div>

            <!-- Form -->
            <form>
                <div class="mb-4">
                    <label for="chapter-name" class="block text-sm font-medium text-gray-700 mb-2">Nama Chapter</label>
                    <input
                        id="chapter-name"
                        type="text"
                        placeholder="Masukkan nama chapter"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                    />
                </div>
                <!-- Submit Button -->
                <div class="text-right">
                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
                    >
                        Tambah Absensi
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Popup Aktifasi Absen -->
    <div x-show="isPopupOpen2" x-cloak class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
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
          <p class="text-lg font-semibold mb-6">Apakah anda yakin ingin mengaktifkan absen ini ?</p>
          <!-- Buttons -->
          <div class="flex justify-center gap-4">
            <button class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-600">Ya</button>
            <button @click="isPopupOpen2 = false" class="bg-red-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-red-600">Tidak</button>
          </div>
        </div>
    </div>
</div>
