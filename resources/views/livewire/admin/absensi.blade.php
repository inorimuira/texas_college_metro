<div class="w-full"
    <div>
        <div class="flex justify-between items-center p-8">
            <div>
                <h1 class="text-xl font-bold text-gray-800">Manage Absen</h1>
            </div>
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Tambah Absen</button>
        </div>

        <!-- Search bar -->
        <div class="flex items-center space-x-2 p-8">
            <input type="text" placeholder="Cari"
                class="w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600" alt="Book Icon">
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <table class="w-full text-left table-auto">
                <thead>
                    <tr class="text-gray-600">
                        <th class="py-2 px-4 border-b">Nama Lengkap</th>
                        <th class="py-2 px-4 border-b">Status Akun</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Sample Row -->
                    <tr>
                        <td class="py-2 px-4 border-b">Hendra Gunawan Santoso</td>
                        <td class="py-2 px-4 border-b">
                            <span class="px-2 py-1 bg-orange-200 text-orange-700 rounded-full text-xs">Aktif</span>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <img src="{{ asset('assets/image/iconMata.png') }}" class="h-5 w-5" alt="Mata Icon">
                            </button>
                            <button class="text-yellow-500 hover:text-yellow-700 mr-2">
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
</div>
