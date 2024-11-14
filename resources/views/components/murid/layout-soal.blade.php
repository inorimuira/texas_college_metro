@props(['nomorSoal',
        'pertanyaan'=>'Masukan pertanyaan!',
        'opsi1'=>'Opsi jawaban 1',
        'opsi2'=>'Opsi jawaban 2',
        'opsi3'=>'Opsi jawaban 3'
        ])

<div class="grid gap-2 mb-4">
    <label class="text-base md:text-lg font-bold text-black">{{ $nomorSoal }}. {{ $pertanyaan }}</label>
    <div class="grid ps-3 gap-2">
        <div class="flex items-center gap-2">
            <input type="radio" name="pilihan" id="{{ $opsi1 }}" class="w-4 h-4">
            <label for="{{ $opsi1 }}" class="font-semibold text-sm text-slate-800">{{ $opsi1 }}</label>
        </div>
        <div class="flex items-center gap-2">
            <input type="radio" name="pilihan" id="{{ $opsi2 }}" class="w-4 h-4">
            <label for="{{ $opsi2 }}" class="font-semibold text-sm text-slate-800">{{ $opsi2 }}</label>
        </div>
        <div class="flex items-center gap-2">
            <input type="radio" name="pilihan" id="{{ $opsi3 }}" class="w-4 h-4">
            <label for="{{ $opsi3 }}" class="font-semibold text-sm text-slate-800">{{ $opsi3 }}</label>
        </div>
    </div>
</div>
