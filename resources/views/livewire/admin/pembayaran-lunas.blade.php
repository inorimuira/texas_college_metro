<div class="w-full" x-data="{ isPreviewMurid: @entangle('isPreviewMurid'), kelasUnggulan: true, kelasReguler: false, statusPembayaran: false }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Pembayaran Lunas</h1>
                    <p class="text-gray-500">Kelola seluruh pembayaran lunas</p>
                </div>
                <div>
                    <x-button-secondary type="button" iconNone="true" class="text-sm">Export</x-button-secondary>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center mb-4 relative">
                <input type="text"
                       placeholder="Cari"
                       wire:model.live.debounce.500ms="search"
                       class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 pr-10 transition duration-200 ease-in-out" />

            </div>

            <!-- Table Data Murid -->
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-primary-300">
                        <th class="px-4 py-2 border">Nama Lengkap</th>
                        <th class="px-4 py-2 border">NIK/NISN</th>
                        <th class="px-4 py-2 border">Program</th>
                        <th class="px-4 py-2 border">Status Pembayaran</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="px-4 py-3 border text-center text-sm">{{ $item->name }}</td>
                            <td class="px-4 py-3 border text-center text-sm">{{ $item->murid->nik_nisn }}</td>
                            <td class="py-3 border text-center text-sm">
                                @if ($item->murid->keperluan_khusus != null && $item->murid->jadwal == null)
                                    <span class="px-4 py-2 bg-highlight text-sm text-slate-700 font-semibold rounded-full">
                                        Unggulan
                                    </span>
                                @elseif ($item->murid->keperluan_khusus == null && $item->murid->jadwal != null)
                                        <span class="px-4 py-2 bg-primary-1100 text-sm text-white font-semibold rounded-full">
                                            Reguler
                                        </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 border text-center text-sm">
                                @if ($item->murid->tagihan->status_tagihan == "Lunas")
                                    <span class="px-4 py-2 bg-emerald-200 text-sm text-emerald-800 font-semibold rounded-full">
                                        Lunas
                                    </span>
                                @else
                                    <span class="px-4 py-2 bg-amber-200 text-sm text-amber-800 font-semibold rounded-full">
                                        Belum Lunas
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 border text-center space-x-1">
                                <button wire:click="detailTagihan({{ $item->murid->tagihan->id }})">
                                    <x-icon-admin icon="iconView" fill="#000"></x-icon-admin>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div x-show="isPreviewMurid" x-transition x-cloak
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg h-full max-h-[80%] w-full max-w-[80%] md:max-w-max p-5 relative overflow-y-scroll"
            @click.away="isPopupEditSummary = false">
            <!-- Close Button -->
            <button @click="isPreviewMurid = false"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
            </button>

            <!-- Popup Header -->
            <div class="flex items-center mb-4">
                <h2 class="text-lg md:text-xl font-bold">Manage Pembayaran Murid</h2>
            </div>

            <!-- Field Data Murid -->
            <div class="grid grid-cols-1 gap-y-6">
                <div class="w-full space-y-2">
                    <span class="grid grid-cols-2 text-base font-medium text-gray-800 items-baseline">
                        Program
                        <span class="text-base font-normal text-gray-600">
                            :
                            @if ($tagihan && $tagihan->isNotEmpty())
                                @foreach ($tagihan as $item)
                                    @if ($item->murid->keperluan_khusus != null && $item->murid->jadwal == null)
                                        <span class="px-4 py-2 bg-highlight text-sm text-slate-700 font-semibold rounded-full">
                                            Unggulan
                                        </span>
                                    @elseif ($item->murid->keperluan_khusus == null && $item->murid->jadwal != null)
                                        <span class="px-4 py-2 bg-primary-1100 text-sm text-white font-semibold rounded-full">
                                            Reguler
                                        </span>
                                    @endif
                                @endforeach
                            @endif
                        </span>
                    </span>
                    <span class="grid grid-cols-2 text-base font-medium text-gray-800 items-baseline">
                        Jumlah yang harus dibayarkan
                        <span class="text-base font-normal flex gap-1">: Rp. 1.000.000</span>
                    </span>
                </div>
                <div class="overflow-x-scroll">
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Angsuran</th>
                                <th class="px-4 py-2 border">Nominal yang dibayarkan</th>
                                <th class="px-4 py-2 border">Tanggal Pembayaran</th>
                                {{-- <th class="px-4 py-2 border">Jumlah Terakhir</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 border text-center text-base text-gray-700">Angsuran Ke-1</td>
                                <td class="px-4 py-2 border text-center text-base text-gray-700">Rp. 250.000</td>
                                <td class="px-4 py-2 border text-center text-base text-gray-700">15 November 2024</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border text-center text-base text-gray-700">Angsuran Ke-2</td>
                                <td class="px-4 py-2 border text-center text-base text-gray-700">Rp. 250.000</td>
                                <td class="px-4 py-2 border text-center text-base text-gray-700">15 November 2024</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="px-4 py-2 border text-center text-base text-gray-700">Total </td>
                                <td colspan="2" class="px-4 py-2 border text-base text-gray-700">Rp. 500.000</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <form action="">
                    <div class="w-full bg-yellow-100 text-amber-900 text-center my-2 py-2 rounded-md text-base font-semibold">
                        Tambah Data Angsuran Dibawah Ini!
                    </div>
                    <div class="w-full flex flex-col md:flex-row items-baseline mb-1">
                        <label class="w-1/2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="angsuran">Angsuran</label>
                        <input type="text" placeholder="ex: Angsuran Ke-1"
                            class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                    </div>
                    <div class="w-full flex flex-col md:flex-row items-baseline mb-1">
                        <label class="w-1/2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="nominal_angsuran">Nominal Angsuran</label>
                        <input type="number" placeholder="Masukan hanya angka. ex: Rp.250.000"
                            class="w-full rounded-lg placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                    </div>
                    <div class="w-full flex flex-col md:flex-row items-baseline mb-1">
                        <label class="w-full md:w-1/2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="tgl_pembayaran">Tanggal Pembayaran</label>
                        <input type="date"
                            class="w-full rounded-lg text-sm bg-gray-50 border border-gray-300 text-gray-900">
                    </div>
                </form>
            </div>
            <div class="flex justify-end mt-3">
                <x-button-primary iconNone="true" class="text-sm">Update Angsuran</x-button-primary>
            </div>
        </div>
    </div>
</div>
