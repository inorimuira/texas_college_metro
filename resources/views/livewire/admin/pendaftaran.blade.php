<!-- Main Content -->
<div class="flex-1 p-10" x-data="{ showPopupDelete: false, showPopupMata: @entangle('showPopupMata') }" x-cloak>
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
    <div class="flex items-center mb-4 relative">
        <input type="text"
               placeholder="Cari"
               wire:model.live.debounce.500ms="search"
               class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 pr-10 transition duration-200 ease-in-out" />

    </div>

    <!-- Table -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        @if ($data->isEmpty())
            <p class="text-center text-gray-600">Tidak Ada Data</p>
        @else
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
                    @foreach ($data as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->nama_lengkap }}</td>
                            <td class="py-2 px-4 border-b">
                                <span class="px-2 py-1
                                    {{ $item->status ? 'bg-green-200 text-green-800 rounded-full text-xs' : 'bg-red-200 text-red-800 rounded-full text-xs' }}">
                                    {{ $item->status ? 'Sudah Di Validasi' : 'Perlu Validasi Pendaftaran' }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b">{{ ($item->keperluan_khusus == true) ? 'Unggulan' : 'Reguler' }}</td>
                            <td class="py-2 px-4 border-b">
                                <span class="px-2 py-1 bg-orange-200 text-orange-700 rounded-full text-xs">{{ $item->jenis_pembayaran }}</span>
                            </td>
                            <td class="py-2 px- 4 border-b">
                                <button wire:click="selectStudent('{{ $item->id }}')" class="text-blue-500 hover:text-blue-700 mr-2">
                                    <svg height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" fill="currentColor">
                                        <path d="M0,226v32c128,192,384,192,512,0v-32C384,34,128,34,0,226z M256,370c-70.7,0-128-57.3-128-128s57.3-128,128-128
                                            s128,57.3,128,128S326.7,370,256,370z M256,170c0-8.3,1.7-16.1,4.3-23.6c-1.5-0.1-2.8-0.4-4.3-0.4c-53,0-96,43-96,96s43,96,96,96
                                            c53,0,96-43,96-96c0-1.5-0.4-2.8-0.4-4.3c-7.4,2.6-15.3,4.3-23.6,4.3C288.2,242,256,209.8,256,170z"/>
                                    </svg>
                                </button>
                                <button wire:click="confirmDelete('{{ $item->id }}')" class="text-red-500 hover:text-red-700">
                                    <svg width="20px" height="20px" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor">
                                        <title>trash-solid</title>
                                        <path class="clr-i-solid clr-i-solid-path-1" d="M6,9V31a2.93,2.93,0,0,0,2.86,3H27.09A2.93,2.93,0,0,0,30,31V9Zm9,20H13V14h2Zm8,0H21V14h2Z"></path>
                                        <path class="clr-i-solid clr-i-solid-path-2" d="M30.73,5H23V4A2,2,0,0,0,21,2h-6.2A2,2,0,0,0,13,4V5H5A1,1,0,1,0,5,7H30.73a1,1,0,0,0,0-2Z"></path>
                                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- popupValidAkun -->
    @if($selectedStudent)
        <div x-show="showPopupMata"  class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
        x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <div class="bg-white w-3/4 p-6 rounded-lg shadow-lg">
            <h1 class="text-center text-lg font-semibold mb-4">Validasi Akun Siswa</h1>
            <div class="grid grid-cols-2 gap-4 border border-blue-300 p-4 mb-4">
                    <div>
                        <p><span class="font-semibold">Email</span> : <span>{{ $selectedStudent->email }}</span></p>
                        <p><span class="font-semibold">Username</span> : <span>{{ $selectedStudent->username }}</span></p>
                        <p><span class="font-semibold">Password</span> : <span>{{ $selectedStudent->password }}</span></p>
                        <p><span class="font-semibold">Nama Lengkap</span> : <span>{{ $selectedStudent->nama_lengkap }}</span></p>
                        <p><span class="font-semibold">Nomor Whatsapp</span> : <span>{{ $selectedStudent->nomor_whatsapp }}</span></p>
                        <p><span class="font-semibold">Tanggal Lahir</span> : <span>{{ $selectedStudent->tanggal_lahir }}</span></p>
                        <p><span class="font-semibold">NIK/NISN</span> : <span>{{ $selectedStudent->nik_nisn }}</span></p>
                        <p><span class="font-semibold">Asal Sekolah</span> : <span>{{ $selectedStudent->asal_sekolah }}</span></p>
                        <p><span class="font-semibold">Nama Ayah</span> : <span>{{ $selectedStudent->nama_ayah }}</span></p>
                        <p><span class="font-semibold">Pekerjaan Ayah</span> : <span>{{ $selectedStudent->pekerjaan_ayah }}</span></p>
                    </div>
                    <div>
                        <p><span class="font-semibold">Nama Ibu</span> : <span>{{ $selectedStudent->nama_ibu }}</span></p>
                        <p><span class="font-semibold">Pekerjaan Ibu</span> : <span>{{ $selectedStudent->pekerjaan_ibu }}</span></p>
                        <p><span class="font-semibold">Alamat Domisili</span> : <span>{{ $selectedStudent->alamat_domisili }}</span></p>
                        <p><span class="font-semibold">Alamat Sekolah</span> : <span>{{ $selectedStudent->alamat_sekolah }}</span></p>
                        <p><span class="font-semibold"><span>{{ $selectedStudent->jadwal ? 'Jadwal' : 'Keperluan Khusus' }}</span></span> : <span>{{ $selectedStudent->jadwal ? $selectedStudent->jadwal : $selectedStudent->keperluan_khusus }}</span></p>
                        <p><span class="font-semibold">Nomor Rekening Pengirim</span> : <span>{{ $selectedStudent->nomor_rekening_pengirim }}</span></p>
                        <p><span class="font-semibold">Atas Nama Rekening Pengirim</span> : <span>{{ $selectedStudent->atas_nama_rekening_pengirim }}</span></p>
                        <p><span class="font-semibold">Nominal Pembayaran</span> : <span>{{ $selectedStudent->nominal_pembayaran }}</span></p>
                        <p><span class="font-semibold">Jenis Pembayaran</span> : <span>{{ $selectedStudent->jenis_pembayaran }}</span></p>
                        <p><span class="font-semibold">Rekening Tujuan</span> : <span>{{ $selectedStudent->rekening_tujuan }}</span></p>
                    </div>
            </div>

            <!-- Payment Proof Section -->
            <div class="mb-4">
                <p class="font-semibold mb-2">Bukti Pembayaran :</p>
                <div class="border border-gray-300 rounded p-4 flex justify-center">
                    <span>{{ $selectedStudent->keperluan_khusus }}</span>
                    <img src="{{ $selectedStudent->keperluan_khusus == ''
                        ? asset('storage/pendaftaran/reguler/' . $selectedStudent->bukti_pembayaran)
                        : asset('storage/pendaftaran/unggulan/' . $selectedStudent->bukti_pembayaran) }}"
                        alt="Bukti Pembayaran" class="max-h-64">
                </div>
            </div>

            <!-- Validation Button -->
            <div class="text-center">
            <button wire:click="validateAccount('{{ $selectedStudent->id }}')" class="bg-blue-500 text-white py-2 px-4 rounded">Validasi Akun</button>
            <button @click="showPopupMata = false" class="bg-red-500 text-white py-2 px-4 rounded ml-4">Tutup</button>
            </div>
        </div>
        </div>

        <div x-show="showPopupDelete" class="fixed inset-0 flex items-center justify-center bg-opacity-50 bg-gray-200">
            <div class="bg-white rounded-lg shadow-lg p-6 w-80 text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-yellow-100 text-yellow-500 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-line join="round" stroke-width="2" d="M13 16h-1v-4h-1m0-4h.01M12 8v.01M7 8c.66 0 1 .34 1 1 0 .66-.34 1-1 1H6c-.66 0-1-.34-1-1s.34-1 1-1h1zm0 6c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1H7zm10 0c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1h-1zm-4-6c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1h-1zm0 6c-.66 0-1 .34-1 1 0 .66.34 1 1 1h1c.66 0 1-.34 1-1 0-.66-.34-1-1-1h-1z" />
                        </svg>
                    </div>
                </div>
                <p class="text-lg font-semibold mb-6">Apakah Anda Yakin Ingin Menghapus Akun Ini !</p>
                <div class="flex justify-center gap-4">
                    <button wire:click="deleteAccount('{{ $item->id }}')" class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-600">Ya</button>
                    <button @click="showPopupDelete = false" class="bg-red-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-red-600">Tidak</button>
                </div>
            </div>
        </div>
    @endif
</div>
