@props([
        'iconType', 
        'iconBeforeText' => false, 
        'iconAfterText' => false, 
        'iconNone' => false, 
        'type'
])

@php
    $classes = 'flex items-center px-4 py-2 bg-primary-1100 hover:bg-primary-1300 hover:transition text-white rounded-lg gap-x-2 cursor-pointer';
@endphp

@if ($iconBeforeText || $iconAfterText || $iconNone)
    @if ($iconBeforeText)
        <button type="{{ $type }}"
            {{ $attributes->merge(['class' => $classes]) }}>
            <x-icon icon="{{ $iconType }}" class="w-4 h-4"></x-icon>
            <span>{{ $slot }}</span>
        </button>
    @endif
    @if ($iconAfterText)
        <button type="{{ $type }}"
            {{ $attributes->merge(['class' => $classes]) }}>
            <span>{{ $slot }}</span>
            <x-icon icon="{{ $iconType }}" class="w-4 h-4"></x-icon>
        </button>
    @endif
    @if ($iconNone)
        <button type="{{ $type }}"
            {{ $attributes->merge(['class' => $classes]) }}>
            <span>{{ $slot }}</span>
        </button>
    @endif
@endif
