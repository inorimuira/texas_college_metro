@props(['id',
        'nomorSoal',
        'pertanyaan',
        'opsi1',
        'opsi2',
        'opsi3',
        'opsi4'
        ])

<div class="grid gap-2 mb-4" id="{{ $nomorSoal }}">
    <label class="text-base md:text-lg font-bold text-black">{{ $nomorSoal }}. {{ $pertanyaan }}</label>
    <div class="grid ps-3 gap-2">
        <div class="flex items-center gap-2">
            <input type="radio" name="pilihan_{{ $nomorSoal }}" id="{{ $nomorSoal }}_{{ $opsi1 }}" class="w-4 h-4">
            <label for="{{ $nomorSoal }}_{{ $opsi1 }}" class="font-semibold text-sm text-slate-800">{{ $opsi1 }}</label>
        </div>
        <div class="flex items-center gap-2">
            <input type="radio" name="pilihan_{{ $nomorSoal }}" id="{{ $nomorSoal }}_{{ $opsi2 }}" class="w-4 h-4">
            <label for="{{ $nomorSoal }}_{{ $opsi2 }}" class="font-semibold text-sm text-slate-800">{{ $opsi2 }}</label>
        </div>
        <div class="flex items-center gap-2">
            <input type="radio" name="pilihan_{{ $nomorSoal }}" id="{{ $nomorSoal }}_{{ $opsi3 }}" class="w-4 h-4">
            <label for="{{ $nomorSoal }}_{{ $opsi3 }}" class="font-semibold text-sm text-slate-800">{{ $opsi3 }}</label>
        </div>
        <div class="flex items-center gap-2">
            <input type="radio" name="pilihan_{{ $nomorSoal }}" id="{{ $nomorSoal }}_{{ $opsi4 }}" class="w-4 h-4">
            <label for="{{ $nomorSoal }}_{{ $opsi4 }}" class="font-semibold text-sm text-slate-800">{{ $opsi4 }}</label>
        </div>
    </div>
</div>
