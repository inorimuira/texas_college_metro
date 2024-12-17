<div class="w-full" x-data="{ isPreviewMurid: @entangle('isPreviewMurid'), kelasUnggulan: true, kelasReguler: false, statusPembayaran: false, showImageModal: false, imageSrc: null }">
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

            @if ($data->isEmpty())
                <p class="text-center text-gray-600">Tidak Ada Data</p>
            @else
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
            @endif
        </div>
    </div>

    <div x-show="isPreviewMurid" x-cloak class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg h-full max-h-[80%] w-full max-w-[80%] md:max-w-max p-5 relative overflow-y-auto">
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
                        @if ($tagihan && $tagihan->isNotEmpty())
                            @foreach ($tagihan as $item)
                                <span class="text-base font-normal flex gap-1 max-w-full overflow-hidden">
                                    :
                                    @if ($item->potongan_harga != 0)
                                        <span class="text-red-500 font-bold"><del class="text-gray-500">Rp {{ number_format($item->total_tagihan, 0, ',', '.') }}</del> Rp {{ number_format($item->total_tagihan - $item->potongan_harga, 0, ',', '.') }} + (Rp 100.000 biaya pendaftaran)</span>
                                    @else
                                    <span class="text-red-500 font-bold">
                                        Rp. {{ $item->total_tagihan }}
                                    </span>
                                    @endif
                                </span>
                            @endforeach
                        @endif
                    </span>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto w-full">

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Angsuran</th>
                                <th class="px-4 py-2 border">Nominal yang dibayarkan</th>
                                <th class="px-4 py-2 border">Tanggal Pembayaran</th>
                                <th class="px-4 py-2 border">Bukti Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($tagihan && $tagihan->isNotEmpty())
                                @foreach ($tagihan as $item)
                                    @foreach ($item->angsuran as $angsuran)
                                        <tr>
                                            <td class="px-4 py-2 border text-center text-base text-gray-700">Angsuran Ke-{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2 border text-center text-base text-gray-700">Rp {{ number_format($angsuran->nominal, 0, ',', '.') }}</td>
                                            <td class="px-4 py-2 border text-center text-base text-gray-700">{{ \Carbon\Carbon::parse($angsuran->created_at)->translatedFormat('d F Y') }}</td>
                                            <td class="px-4 py-2 border text-center text-gray-700">
                                                <div class="flex justify-center items-center">
                                                    <img alt="Bukti Bayar" class="w-12 h-auto cursor-pointer"
                                                         src="{{ $item->keperluan_khusus != null ? asset('storage/angsuran/unggulan/' . $angsuran->bukti_bayar) : asset('storage/angsuran/reguler/' . $angsuran->bukti_bayar) }}"
                                                         loading="lazy"
                                                         @click="showImageModal = true; imageSrc = '{{ $item->keperluan_khusus != null ? asset('storage/angsuran/unggulan/' . $angsuran->bukti_bayar) : asset('storage/angsuran/reguler/' . $angsuran->bukti_bayar) }}'"/>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="px-4 py-2 border text-center text-base text-gray-700 font-bold">Total </td>
                                <td class="px-4 py-2 border text-base text-gray-700 font-bold">
                                    Rp.
                                    @php
                                        $totalAngsuran = 0;
                                        if ($tagihan && $tagihan->isNotEmpty()) {
                                            $totalAngsuran = $tagihan->sum(function ($item) {
                                                return $item->angsuran->sum('nominal') ?? 0;
                                            });
                                        }
                                    @endphp
                                    {{ number_format($totalAngsuran, 0, ',', '.') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div x-show="showImageModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50" x-cloak>
        <div @click.away="showImageModal = false" class="bg-white p-4 rounded-lg shadow-lg max-w-full max-h-full overflow-auto">
            <img :src="imageSrc" alt="Bukti Pembayaran" class="max-w-full max-h-[80vh] object-contain mx-auto" loading="lazy"/>
        </div>
    </div>
</div>
