@props(['id',
        'nomorSoal',
        'pertanyaan',
        'opsi1',
        'opsi2',
        'opsi3',
        'opsi4',
        'errors',
        ])

<div class="grid gap-2 mb-4" id="{{ $nomorSoal }}">
    <label class="text-base md:text-lg font-bold text-black">
        {{ $nomorSoal }}. {!! $pertanyaan !!}
        @if (array_key_exists('pilihan.' . $nomorSoal, $errors) && count($errors['pilihan.' . $nomorSoal]) > 0)
            <span class="mt-2 text-sm text-red-600">{{ $errors['pilihan.' . $nomorSoal][0] }}</span>
        @endif
    </label>

    <div class="grid ps-3 gap-2">
        <div class="flex items-center gap-2">
            <input wire:model="pilihan.{{ $nomorSoal }}" type="radio" value="{{ $opsi1 }}" name="pilihan.{{ $nomorSoal }}" class="w-4 h-4">
            <label class="font-semibold text-sm text-slate-800">{{ $opsi1 }}</label>
        </div>
        <div class="flex items-center gap-2">
            <input wire:model="pilihan.{{ $nomorSoal }}" type="radio" value="{{ $opsi2 }}"  name="pilihan.{{ $nomorSoal }}" class="w-4 h-4">
            <label class="font-semibold text-sm text-slate-800">{{ $opsi2 }}</label>
        </div>
        <div class="flex items-center gap-2">
            <input wire:model="pilihan.{{ $nomorSoal }}" type="radio" value="{{ $opsi3 }}"  name="pilihan.{{ $nomorSoal }}" class="w-4 h-4">
            <label class="font-semibold text-sm text-slate-800">{{ $opsi3 }}</label>
        </div>
        <div class="flex items-center gap-2">
            <input wire:model="pilihan.{{ $nomorSoal }}" type="radio" value="{{ $opsi4 }}"  name="pilihan.{{ $nomorSoal }}" class="w-4 h-4">
            <label class="font-semibold text-sm text-slate-800">{{ $opsi4 }}</label>
        </div>
    </div>
</div>
