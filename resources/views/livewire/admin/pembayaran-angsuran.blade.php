<div class="w-full" x-data="{ isPreviewMurid: @entangle('isPreviewMurid'), kelasUnggulan: true, kelasReguler: false, statusAngsuran: false }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div class="bg-white shadow-md rounded-md p-6" x-data="{ showImageModal: false, imageSrc: null }" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Pembayaran Angsuran</h1>
                    <p class="text-gray-500">Kelola seluruh pembayaran angsuran</p>
                </div>
                <div>
                    <x-button-secondary type="button" iconNone="true" class="text-sm">Export</x-button-secondary>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center mb-4 relative">
                <input type="text" placeholder="Cari" wire:model.live.debounce.500ms="search"
                    class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 pr-10 transition duration-200 ease-in-out" />

            </div>

            <!-- Table Data Murid -->
            <div class="overflow-x-auto">
                @if ($data->isEmpty())
                    <p class="text-center text-gray-600">Tidak Ada Data</p>
                @else
                    <table class="w-full table-auto overflow-x-auto">
                        <thead>
                            <tr class="bg-primary-300">
                                <th class="px-4 py-2 border">Nama Lengkap</th>
                                <th class="px-4 py-2 border">NIK/NISN</th>
                                <th class="px-4 py-2 border">Program</th>
                                <th class="px-4 py-2 border">Status Angsuran</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="px-4 py-3 border text-center text-sm">{{ $item->name }}</td>
                                <td class="px-4 py-3 border text-center text-sm">{{ optional($item->murid)->nik_nisn }}</td>
                                <td class="py-3 border text-center text-sm">
                                    @if (optional($item->murid)->keperluan_khusus != null && optional($item->murid)->jadwal == null)
                                        <span class="px-4 py-2 bg-highlight text-sm text-slate-700 font-semibold rounded-full">
                                            Unggulan
                                        </span>
                                    @elseif (optional($item->murid)->keperluan_khusus == null && optional($item->murid)->jadwal != null)
                                        <span class="px-4 py-2 bg-primary-1100 text-sm text-white font-semibold rounded-full">
                                            Reguler
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 border text-center text-sm">
                                    @if (optional(optional($item->murid)->tagihan)->status_tagihan == "Lunas")
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
                                    @if (optional($item->murid->tagihan)->id)
                                        <button wire:click="detailTagihan({{ $item->murid->tagihan->id }}, {{ $item->murid->user_id }})">
                                            <x-icon-admin icon="iconView" fill="#000"></x-icon-admin>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div x-data="{ jenisPembayaran: 'tunai' }" x-show="isPreviewMurid" x-transition x-cloak
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg max-h-[80%] w-full max-w-[40%] p-5 relative overflow-y-auto">
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
                    <form wire:submit.prevent="simpanAngsuran({{ $tagihanId }}, {{ $userId }})" class="grid grid-cols-1 gap-y-6">
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

                        <div class="overflow-x-auto w-auto">
                            <table class="table-auto w-full border-collapse border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-2 border">Angsuran</th>
                                        <th class="px-4 py-2 border">Nominal yang Dibayarkan</th>
                                        <th class="px-4 py-2 border">Tanggal Pembayaran</th>
                                        <th class="px-4 py-2 border">Bukti Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($tagihan && $tagihan->isNotEmpty())
                                        @foreach ($tagihan as $item)
                                            @foreach ($item->angsuran as $index => $angsuran)
                                                <tr class="{{ $loop->even ? 'bg-gray-50' : '' }}">
                                                    <td class="px-4 py-2 border text-center text-gray-700">Angsuran Ke-{{ $index + 1 }}</td>
                                                    <td class="px-4 py-2 border text-center text-gray-700">
                                                        Rp {{ number_format($angsuran->nominal, 0, ',', '.') }}
                                                    </td>
                                                    <td class="px-4 py-2 border text-center text-gray-700">
                                                        {{ \Carbon\Carbon::parse($angsuran->created_at)->translatedFormat('d F Y') }}
                                                    </td>
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
                                    @else
                                        <tr>
                                            <td colspan="4" class="px-4 py-2 border text-center text-gray-500">
                                                Tidak ada data angsuran tersedia.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot class="bg-gray-100">
                                    <tr>
                                        <td colspan="3" class="px-4 py-2 border text-center font-bold text-gray-700">Total</td>
                                        <td class="px-4 py-2 border font-bold text-gray-700">
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

                        <!-- Jenis Pembayaran Select -->
                        <div class="w-full flex flex-col mb-1">
                            <label for="jenis_pembayaran" class="text-sm font-medium">Jenis Pembayaran</label>
                            <span class="text-red-500 text-sm mt-1">@error('jenisPembayaran') {{ $message }} @enderror</span>
                            <select wire:model="jenisPembayaran" x-model="jenisPembayaran" id="jenis_pembayaran"
                                    class="w-full rounded-lg bg-gray-50 border border-gray-300 text-gray-900">
                                <option value="">Pilih Jenis Pembayaran</option>
                                <option value="Tunai">Tunai</option>
                                <option value="Non Tunai">Non Tunai</option>
                            </select>
                        </div>

                        <div x-show="jenisPembayaran === 'Non Tunai'" class="w-full flex flex-col mb-1">
                            <label class="text-sm font-medium" for="nomor_rekening_pengirim">Nomor Rekening Pengirim</label>
                            <span class="text-red-500 text-sm mt-1">@error('nomor_rekening_pengirim') {{ $message }} @enderror</span>
                            <input type="text" wire:model="nomor_rekening_pengirim" id="nomor_rekening_pengirim" placeholder="Masukkan nomor rekening pengirim"
                                class="w-full rounded-lg bg-gray-50 border border-gray-300 text-gray-900">
                        </div>

                        <div x-show="jenisPembayaran === 'Non Tunai'" class="w-full flex flex-col mb-1">
                            <label class="text-sm font-medium" for="atas_nama_pengirim">Atas Nama Pengirim</label>
                            <span class="text-red-500 text-sm mt-1">@error('atas_nama_pengirim') {{ $message }} @enderror</span>
                            <input type="text" wire:model="atas_nama_pengirim" id="atas_nama_pengirim" placeholder="Masukkan atas nama pengirim"
                                class="w-full rounded-lg bg-gray-50 border border-gray-300 text-gray-900">
                        </div>

                        <div x-show="jenisPembayaran === 'Tunai' || jenisPembayaran === 'Non Tunai'" class="w-full flex flex-col mb-1">
                            <label class="text-sm font-medium" for="nominal">Nominal</label>
                            <span class="text-red-500 text-sm mt-1">@error('nominal') {{ $message }} @enderror</span>
                            <input type="number" wire:model="nominal" id="nominal" placeholder="Masukkan nominal pembayaran"
                                class="w-full rounded-lg bg-gray-50 border border-gray-300 text-gray-900">
                        </div>

                        <div x-show="jenisPembayaran === 'Non Tunai'" class="w-full flex flex-col mb-1">
                            <label class="text-sm font-medium" for="bukti_bayar">Bukti Pembayaran</label>
                            <span class="text-red-500 text-sm mt-1">@error('bukti_bayar') {{ $message }} @enderror</span>
                            <input type="file" wire:model="bukti_bayar" id="bukti_bayar" class="w-full rounded-lg bg-gray-50 border border-gray-300 text-gray-900">
                        </div>

                        <div class="flex justify-end mt-3">
                            <x-button-primary type="submit" iconNone="true" class="text-sm">Update Angsuran</x-button-primary>
                        </div>
                    </form>
                </div>
            </div>

            <div x-show="showImageModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50" x-cloak>
                <div @click.away="showImageModal = false" class="bg-white p-4 rounded-lg shadow-lg max-w-full max-h-full overflow-auto">
                    <img :src="imageSrc" alt="Bukti Pembayaran" class="max-w-full max-h-[80vh] object-contain mx-auto" loading="lazy"/>
                </div>
            </div>
        </div>
    </div>
</div>
