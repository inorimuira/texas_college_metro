<div class="bg-gray-100">
    <div class="flex flex-col lg:flex-row h-screen">
      <!-- Main Content -->
      <div class="flex-1 p-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-xl font-bold text-gray-800">Manage Absensi</h1>
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

          <!-- Rekap Absensi -->
          <h3 class="text-lg font-medium mb-4">Rekap Absensi Siswa</h3>
          <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-sm">
              <thead>
                <tr class="bg-gray-100">
                  <th class="border border-gray-300 px-4 py-2 text-left">Nama Siswa</th>
                  <th class="border border-gray-300 px-4 py-2 text-left">Time</th>
                  <th class="border border-gray-300 px-4 py-2 text-left">Date</th>
                  <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="border border-gray-300 px-4 py-2">Hendra Darmawan</td>
                  <td class="border border-gray-300 px-4 py-2">15:00</td>
                  <td class="border border-gray-300 px-4 py-2">2023-10-01</td>
                  <td class="border border-gray-300 px-4 py-2">
                    <span class="text-green-600 font-semibold">Hadir</span>
                  </td>
                </tr>
                <tr>
                  <td class="border border-gray-300 px-4 py-2">Hendra Darmawan</td>
                  <td class="border border-gray-300 px-4 py-2">15:00</td>
                  <td class="border border-gray-300 px-4 py-2">2023-10-01</td>
                  <td class="border border-gray-300 px-4 py-2">
                    <span class="text-red-600 font-semibold">Absen</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
