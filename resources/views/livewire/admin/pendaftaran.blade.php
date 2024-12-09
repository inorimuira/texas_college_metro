<!-- Main Content -->
<div class="flex-1 p-10" x-data="{ showPopupInfo: @entangle('showPopupInfo') }" x-cloak>
    <!-- Topbar -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Pendaftaran</h1>
    </div>

    <!-- Search and Filter -->
    <div class="flex items-center mb-4 relative">
        <input type="text"
               placeholder="Cari"
               wire:model.live.debounce.500ms="search"
               class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 pr-10 transition duration-200 ease-in-out" />

    </div>

    <!-- Table -->
    <div class="bg-white p-2 lg:p-6 rounded-lg shadow-lg overflow-x-auto">
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
                                    {{ $item->status ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded-full text-xs">
                                    {{ $item->status ? 'Sudah Di Validasi' : 'Perlu Validasi Pendaftaran' }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b">{{ ($item->keperluan_khusus == true) ? 'Unggulan' : 'Reguler' }}</td>
                            <td class="py-2 px-4 border-b">
                                <span class="px-2 py-1 {{ ($item->jenis_pembayaran == "Lunas") ? 'bg-green-200 text-green-700' : 'bg-orange-200 text-orange-700' }} rounded-full text-xs">{{ $item->jenis_pembayaran }}</span>
                            </td>
                            <td class="py-2 px- 4 border-b">
                                <button wire:click="selectStudent('{{ $item->id }}')" class="text-blue-500 hover:text-blue-700 mr-2">
                                    <svg height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" fill="currentColor">
                                        <path d="M0,226v32c128,192,384,192,512,0v-32C384,34,128,34,0,226z M256,370c-70.7,0-128-57.3-128-128s57.3-128,128-128
                                            s128,57.3,128,128S326.7,370,256,370z M256,170c0-8.3,1.7-16.1,4.3-23.6c-1.5-0.1-2.8-0.4-4.3-0.4c-53,0-96,43-96,96s43,96,96,96
                                            c53,0,96-43,96-96c0-1.5-0.4-2.8-0.4-4.3c-7.4,2.6-15.3,4.3-23.6,4.3C288.2,242,256,209.8,256,170z"/>
                                    </svg>
                                </button>
                                <button wire:click="confirmDelete({{ $item->id }})" class="text-red-500 hover:text-red-700">
                                    <svg fill="currentColor" width="20px" height="20px" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>trash-line</title>
                                        <path class="clr-i-outline clr-i-outline-path-1" d="M27.14,34H8.86A2.93,2.93,0,0,1,6,31V11.23H8V31a.93.93,0,0,0,.86,1H27.14A.93.93,0,0,0,28,31V11.23h2V31A2.93,2.93,0,0,1,27.14,34Z"></path>
                                        <path class="clr-i-outline clr-i-outline-path-2" d="M30.78,9H5A1,1,0,0,1,5,7H30.78a1,1,0,0,1,0,2Z"></path>
                                        <rect class="clr-i-outline clr-i-outline-path-3" x="21" y="13" width="2" height="15"></rect>
                                        <rect class="clr-i-outline clr-i-outline-path-4" x="13" y="13" width="2" height="15"></rect>
                                        <path class="clr-i-outline clr-i-outline-path-5" d="M23,5.86H21.1V4H14.9V5.86H13V4a2,2,0,0,1,1.9-2h6.2A2,2,0,0,1,23,4Z"></path>
                                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $data->links() }}
            </div>
        @endif
    </div>

    <!-- popupValidAkun -->
    @if($selectedStudent)
        <div x-show="showPopupInfo"  class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
        x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-data="{ showImageModal: false, imageSrc: null }">
        <div class="bg-white w-3/4 p-6 rounded-lg shadow-lg">
            <h1 class="text-center text-lg font-semibold mb-4">Validasi Akun Murid</h1>
            <div class="grid grid-cols-2 gap-4 border border-blue-300 p-4 mb-4">
                    <div>
                        <p><span class="font-semibold">Email</span> : <span>{{ $selectedStudent->email }}</span></p>
                        <p><span class="font-semibold">Username</span> : <span>{{ $selectedStudent->username }}</span></p>
                        <p><span class="font-semibold">Password</span> : <span>{{ $selectedStudent->password }}</span></p>
                        <p><span class="font-semibold">Nama Lengkap</span> : <span>{{ $selectedStudent->nama_lengkap }}</span></p>
                        <p><span class="font-semibold">Nomor Whatsapp</span> : <span>{{ $selectedStudent->nomor_whatsapp }}</span></p>
                        <p><span class="font-semibold">Tanggal Lahir</span> : <span>{{ $selectedStudent->tgl_lahir }}</span></p>
                        <p><span class="font-semibold">Tingkat Pendidikan</span> : <span>{{ $selectedStudent->tingkat_pendidikan }}</span></p>
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
                        <p><span class="font-semibold">Nominal Pembayaran</span> : <span>Rp {{ $selectedStudent->nominal_pembayaran }}</span></p>
                        <p><span class="font-semibold">Jenis Pembayaran</span> : <span>{{ $selectedStudent->jenis_pembayaran }}</span></p>
                        <p><span class="font-semibold">Rekening Tujuan</span> : <span>{{ $selectedStudent->rekening_tujuan }}</span></p>
                    </div>
            </div>

            <!-- Payment Proof Section -->
            <div class="mb-4">
                <p class="font-semibold mb-2">Bukti Pembayaran :</p>
                <div class="border border-gray-300 rounded p-4 flex justify-center">
                    <img src="{{ $selectedStudent->keperluan_khusus == ''
                        ? asset('storage/pendaftaran/reguler/' . $selectedStudent->bukti_pembayaran)
                        : asset('storage/pendaftaran/unggulan/' . $selectedStudent->bukti_pembayaran) }}"
                        alt="Bukti Pembayaran" class="max-h-64 cursor-pointer"
                        @click="showImageModal = true; imageSrc = '{{ $selectedStudent->keperluan_khusus == ''
                            ? asset('storage/pendaftaran/reguler/' . $selectedStudent->bukti_pembayaran)
                            : asset('storage/pendaftaran/unggulan/' . $selectedStudent->bukti_pembayaran) }}'" />
                </div>
            </div>

            <!-- Modal for Viewing Image -->
            <div x-show="showImageModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50" x-cloak>
                <div @click.away="showImageModal = false" class="bg-white max-w-screen-2xl w-full p-4 rounded-lg shadow-lg"> <!-- Ubah max-w-md menjadi max-w-lg -->
                    <img :src="imageSrc" alt="Bukti Pembayaran" class="w-full h-auto" />
                </div>
            </div>

            <!-- Validation Button -->
            <div class="text-center">
                @if ($selectedStudent->status == false)
                    <button wire:click="validateAccount('{{ $selectedStudent->id }}')" class="bg-blue-500 text-white py-2 px-4 rounded">Validasi Akun</button>
                @endif
            <button @click="showPopupInfo = false" class="bg-red-500 text-white py-2 px-4 rounded ml-4">Tutup</button>
            </div>
        </div>
        </div>
    @endif
</div>
