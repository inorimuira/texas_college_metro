<div class="bg-gray-100 font-sans antialiased">
  <div class="flex h-screen">
      <!-- Sidebar -->
      <div id="sidebar" class="w-64 bg-white shadow-lg md:block hidden">
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
      <div class="flex-1 p-6 md:p-10">
          <!-- Topbar with Hamburger Menu Button -->
          <div class="flex justify-between items-center mb-6">
              <div class="flex items-center space-x-4">
                  <!-- Hamburger Menu Button (Mobile Only) -->
                  <button id="menu-btn" class="md:hidden focus:outline-none">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                  </button>
                  <h1 class="text-2xl font-semibold text-gray-800">Tambah Soal</h1>
              </div>
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

        <!-- Form Section -->
        <div class="flex flex-col md:flex-row border border-blue-300 p-4 md:p-6 rounded-lg bg-white">
            <!-- Left Panel: Question and Answers -->
            <div class="w-full md:w-2/3 mb-4 md:mb-0 md:pr-4">
                <div class="mb-6">
                    <label class="block font-semibold mb-2 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H6a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2v-6a2 2 0 00-2-2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7h2a2 2 0 012 2v6a2 2 0 01-2 2h-2a2 2 0 01-2-2V9a2 2 0 012-2z" />
                        </svg>
                        Pertanyaan
                    </label>
                    <textarea class="w-full p-3 border border-gray-300 rounded" rows="3" placeholder="Masukkan pertanyaan"></textarea>
                </div>

                <div class="mb-6">
                    <label class="block font-semibold mb-2 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        Jawaban
                    </label>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input type="radio" name="jawaban" class="mr-2">
                            <input type="text" class="flex-1 p-2 border border-gray-300 rounded" placeholder="Jawaban A">
                            <button class="text-red-500 ml-2">×</button>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="jawaban" class="mr-2">
                            <input type="text" class="flex-1 p-2 border border-gray-300 rounded" placeholder="Jawaban B">
                            <button class="text-red-500 ml-2">×</button>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="jawaban" class="mr-2">
                            <input type="text" class="flex-1 p-2 border border-gray-300 rounded" placeholder="Jawaban C">
                            <button class="text-red-500 ml-2">×</button>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="jawaban" class="mr-2">
                            <input type="text" class="flex-1 p-2 border border-gray-300 rounded" placeholder="Jawaban D">
                            <button class="text-red-500 ml-2">×</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel: Settings -->
            <div class="w-full md:w-1/3 md:pl-4">
                <div class="border border-gray-300 p-4 rounded-lg">
                    <h2 class="font-semibold mb-4">Setting Soal</h2>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2">Tipe Soal</label>
                        <select class="w-full p-2 border border-gray-300 rounded">
                            <option>Pilihan ganda</option>
                            <option>Essay</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold mb-2">File Audio</label>
                        <input type="file" class="w-full text-gray-700 border border-gray-300 rounded">
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="text-center mt-6">
            <button class="bg-blue-500 text-white py-2 px-6 rounded">Simpan Soal</button>
        </div>
      </div>
  </div>
</div>

<script>
  // JavaScript to toggle sidebar visibility
  const menuBtn = document.getElementById('menu-btn');
  const sidebar = document.getElementById('sidebar');

  menuBtn.addEventListener('click', () => {
      sidebar.classList.toggle('hidden');
  });
</script>

