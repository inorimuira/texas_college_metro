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
                <h1 class="text-2xl font-semibold text-gray-800">Pendaftaran</h1>
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

            <!-- Search and Filter -->
            <div class="flex items-center mb-4">
                <input type="text" placeholder="Cari" class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                    <img src="{{ asset('assets/image/iconSearch.svg') }}" class="h-5 w-5 text-gray-600" alt="Book Icon">
                </button>
            </div>

            <!-- Table -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <table class="w-full text-left table-auto">
                    <thead>
                        <tr class="text-gray-600">
                            <th class="py-2 px-4 border-b">Nama Lengkap</th>
                            <th class="py-2 px-4 border-b">Status Akun</th>
                            <th class="py-2 px-4 border-b">Program</th>
                            <th class="py-2 px-4 border-b">Pembayaran</th>
                            <th class="py-2 px-4 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <!-- Sample Row -->
                        <tr>
                            <td class="py-2 px-4 border-b">Hendra Gunawan Santoso</td>
                            <td class="py-2 px-4 border-b">Aktif</td>
                            <td class="py-2 px-4 border-b">Reguler</td>
                            <td class="py-2 px-4 border-b">
                                <span class="px-2 py-1 bg-orange-200 text-orange-700 rounded-full text-xs">Angsuran</span>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <button id="openPopupButtonMata" class="text-yellow-500 hover:text-yellow-700 mr-2">
                                    <img src="{{ asset('assets/image/iconMata.png') }}" class="h-5 w-5" alt="Edit Pen Icon">
                                </button>
                                <button id="openPopupButtonDelete" class="text-red-500 hover:text-red-700">
                                    <img src="{{ asset('assets/image/iconDelete.svg') }}" class="h-5 w-5" alt="Edit Pen Icon">
                                </button>
                            </td>
                        </tr>
                        <!-- Repeat this row for more entries -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- popupValidAkun -->
    <div id="popupMata" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
      <div class="bg-white w-3/4 p-6 rounded-lg shadow-lg">
        <h1 class="text-center text-lg font-semibold mb-4">Validasi Akun Siswa</h1>
        <div class="grid grid-cols-2 gap-4 border border-blue-300 p-4 mb-4">
          <div>
            <p><span class="font-semibold">Username</span> : hendrasantoso</p>
            <p><span class="font-semibold">Password</span> : 12345</p>
            <p><span class="font-semibold">Tanggal Lahir</span> : 25 Mei 2002</p>
            <p><span class="font-semibold">Email</span> : hendra12@gmail.com</p>
            <p><span class="font-semibold">Nama Lengkap</span> : Hendra</p>
            <p><span class="font-semibold">NIK/NISN</span> : 123456789986531</p>
            <p><span class="font-semibold">Alamat Domisili</span> : Jl. Eno, Gg. Andalas No.3, Way Hui</p>
          </div>
          <div>
            <p><span class="font-semibold">Alamat Sekolah</span> : hendrasantoso</p>
            <p><span class="font-semibold">Asal Sekolah</span> : SMA 1 Bandarlampung</p>
            <p><span class="font-semibold">Nama Ayah</span> : Asep</p>
            <p><span class="font-semibold">Nama Ibu</span> : Siti</p>
            <p><span class="font-semibold">Pekerjaan Orang Tua</span> : CEO</p>
            <p><span class="font-semibold">Nomor Whatsapp</span> : 123456789986531</p>
          </div>
        </div>

        <!-- Payment Proof Section -->
        <div class="mb-4">
          <p class="font-semibold mb-2">Bukti Pembayaran :</p>
          <div class="border border-gray-300 rounded p-4 flex justify-center">
            <img src="bukti-pembayaran.png" alt="Bukti Pembayaran" class="max-h-64">
          </div>
        </div>

        <!-- Validation Button -->
        <div class="text-center">
          <button class="bg-blue-500 text-white py-2 px-4 rounded">Validasi Akun</button>
          <button id="closePopupButton" class="bg-red-500 text-white py-2 px-4 rounded ml-4">Tutup</button>
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
          <p class="text-lg font-semibold mb-6">Apakah Anda Yakin Ingin Menghapus Akun Ini !</p>
          <!-- Buttons -->
          <div class="flex justify-center gap-4">
            <button id="yaDelete" class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-600">Ya</button>
            <button id="tidakDelete" class="bg-red-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-red-600">Tidak</button>
          </div>
        </div>
    </div>

    <script>
      // Mendapatkan elemen tombol dan popup
      const openPopupButtonMata = document.getElementById('openPopupButtonMata');
      const closePopupButton = document.getElementById('closePopupButton');
      const popupMata = document.getElementById('popupMata');

      // Event listener untuk membuka popup
      openPopupButtonMata.addEventListener('click', () => {
        popupMata.classList.remove('hidden');
      });

      // Event listener untuk menutup popup
      closePopupButton.addEventListener('click', () => {
        popupMata.classList.add('hidden');
      });

      // Menutup popup saat klik di luar popup
      window.addEventListener('click', (e) => {
        if (e.target === popupMata) {
          popupMata.classList.add('hidden');
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
