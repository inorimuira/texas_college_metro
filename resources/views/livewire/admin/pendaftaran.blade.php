<!-- Main Content -->
<div class="flex-1 p-10" x-data="{ showPopupInfo: @entangle('showPopupInfo') }" x-cloak>
    <div class="bg-white shadow-md rounded-md p-6">
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

        <div class="overflow-x-auto w-auto">
            @if ($data->isEmpty())
                <p class="text-center text-gray-600">Tidak Ada Data</p>
            @else
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr class="text-gray-600">
                            <th class="px-4 py-2 border">Nama Lengkap</th>
                            <th class="px-4 py-2 border">Status Akun</th>
                            <th class="px-4 py-2 border">Program</th>
                            <th class="px-4 py-2 border">Pembayaran</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($data as $item)
                            <tr>
                                <td class="px-4 py-3 border text-center text-sm">{{ $item->nama_lengkap }}</td>
                                <td class="px-4 py-3 border text-center text-sm">
                                    <span class="px-2 py-1
                                        {{ $item->status ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded-full text-xs">
                                        {{ $item->status ? 'Sudah Di Validasi' : 'Belum di Validasi' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 border text-center text-sm">{{ ($item->keperluan_khusus == true) ? 'Unggulan' : 'Reguler' }}</td>
                                <td class="px-4 py-3 border text-center text-sm">
                                    <span class="px-2 py-1 {{ ($item->jenis_pembayaran == "Lunas") ? 'bg-green-200 text-green-700' : 'bg-orange-200 text-orange-700' }} rounded-full text-xs">{{ $item->jenis_pembayaran }}</span>
                                </td>
                                <td class="px-4 py-3 border text-center text-sm">
                                    <button wire:click="selectStudent('{{ $item->id }}')" class="text-blue-500 hover:text-blue-700 mr-2">
                                        <x-icon-admin icon="iconView" fill="#000"></x-icon-admin>
                                    </button>
                                    <button wire:click="confirmDelete({{ $item->id }})" class="text-red-500 hover:text-red-700">
                                        <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
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

    </div>



    <!-- popupValidAkun -->
    @if($selectedStudent)
        <div x-show="showPopupInfo"  class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50"
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
                        loading="lazy"
                        alt="Bukti Pembayaran" class="max-h-64 cursor-pointer"
                        @click="showImageModal = true; imageSrc = '{{ $selectedStudent->keperluan_khusus == ''
                            ? asset('storage/pendaftaran/reguler/' . $selectedStudent->bukti_pembayaran)
                            : asset('storage/pendaftaran/unggulan/' . $selectedStudent->bukti_pembayaran) }}'" />
                </div>
            </div>

            <!-- Modal for Viewing Image -->
            <div x-show="showImageModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50" x-cloak>
                <div @click.away="showImageModal = false" class="bg-white p-4 rounded-lg shadow-lg max-w-full max-h-full overflow-auto">
                    <img :src="imageSrc" alt="Bukti Pembayaran" class="max-w-full max-h-[80vh] object-contain mx-auto" loading="lazy"/>
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
