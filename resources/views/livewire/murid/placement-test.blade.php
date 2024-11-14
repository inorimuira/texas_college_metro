<div class="bg-placement-test">
    {{-- Navbar --}}
    <div class="w-full flex justify-between items-center px-6 py-4 bg-slate-300">
        <div class="inline-flex items-center gap-4">
            <div class="border rounded-full border-black p-2">
                <x-icon icon="iconArrowLeft" fill="#000"></x-icon>
            </div>
            <span class="text-xl font-bold tracking-wide">Placement Test</span>
        </div>
        <div class="items-center space-x-2 hidden md:inline-flex ">
            <img src="{{ asset('assets/image/avatar.png') }}" alt="User Icon" class="w-6 h-6">
            <span class="text-gray-800 font-medium">Fulan</span>
        </div>
        <button class="inline-flex md:hidden focus:ring-gray-200 rounded-md p-2" @click="isSidebarOpen = true">
            <x-icon icon="iconHamburger" fill="#33338B"></x-icon>
        </button>
    </div>

    {{-- Dummy data untuk layout soal --}}
    @php
        $soalList = [
            [
                'nomorSoal' => 1,
                'pertanyaan' => 'Apa ibukota Indonesia?',
                'opsi1' => 'Jakarta',
                'opsi2' => 'Surabaya',
                'opsi3' => 'Bandung',
            ],
            [
                'nomorSoal' => 2,
                'pertanyaan' => 'Berapa jumlah provinsi di Indonesia?',
                'opsi1' => '34',
                'opsi2' => '35',
                'opsi3' => '36',
            ],
            [
                'nomorSoal' => 3,
                'pertanyaan' => 'Siapa presiden pertama Indonesia?',
                'opsi1' => 'Soekarno',
                'opsi2' => 'Soeharto',
                'opsi3' => 'Habibie',
            ],
            [
                'nomorSoal' => 4,
                'pertanyaan' => 'Apa warna bendera Indonesia?',
                'opsi1' => 'Merah Putih',
                'opsi2' => 'Biru Putih',
                'opsi3' => 'Merah Biru',
            ],
            [
                'nomorSoal' => 5,
                'pertanyaan' => 'Gunung tertinggi di Indonesia adalah?',
                'opsi1' => 'Gunung Bromo',
                'opsi2' => 'Gunung Semeru',
                'opsi3' => 'Puncak Jaya',
            ],
            [
                'nomorSoal' => 6,
                'pertanyaan' => 'Pulau terbesar di Indonesia adalah?',
                'opsi1' => 'Kalimantan',
                'opsi2' => 'Sumatra',
                'opsi3' => 'Papua',
            ],
            [
                'nomorSoal' => 7,
                'pertanyaan' => 'Hari Kemerdekaan Indonesia diperingati pada tanggal?',
                'opsi1' => '17 Agustus',
                'opsi2' => '10 November',
                'opsi3' => '21 April',
            ],
            [
                'nomorSoal' => 8,
                'pertanyaan' => 'Lagu kebangsaan Indonesia adalah?',
                'opsi1' => 'Indonesia Pusaka',
                'opsi2' => 'Indonesia Raya',
                'opsi3' => 'Rayuan Pulau Kelapa',
            ],
            [
                'nomorSoal' => 9,
                'pertanyaan' => 'Siapa Wakil Presiden Indonesia saat ini?',
                'opsi1' => 'Jusuf Kalla',
                'opsi2' => 'Ma\'ruf Amin',
                'opsi3' => 'Sandiaga Uno',
            ],
            [
                'nomorSoal' => 10,
                'pertanyaan' => 'Bahasa resmi Indonesia adalah?',
                'opsi1' => 'Bahasa Jawa',
                'opsi2' => 'Bahasa Melayu',
                'opsi3' => 'Bahasa Indonesia',
            ],
        ];
    @endphp

    {{-- Main Content --}}
    <div class="flex justify-center w-full p-6 md:p-12">
        <div class="bg-gray-300 bg-opacity-20 w-full md:w-full xl:w-3/4 rounded-lg p-4 md:p-8 border border-gray-300">
            <form action="POST" class="">
                @foreach ($soalList as $soal)
                    <x-murid.layout-soal :nomorSoal="$soal['nomorSoal']" :pertanyaan="$soal['pertanyaan']" :opsi1="$soal['opsi1']" :opsi2="$soal['opsi2']" :opsi3="$soal['opsi3']" />
                @endforeach
                <div class="col-span-2 flex justify-end mt-6">
                    <x-button-primary type="button" :iconNone="true">Submit</x-button-primary>
                </div>
                <x-modal-warning></x-modal-warning>
            </form>
        </div>
    </div>
</div>
