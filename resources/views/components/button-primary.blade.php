@props([
    'iconType', 
    'iconBeforeText' => false, 
    'iconAfterText' => false, 
    'iconNone' => false, 
    'type' => 'button',
])

@php
    $classes = 'flex items-center px-4 py-2 bg-primary-1100 hover:bg-primary-1300 hover:transition text-white rounded-lg gap-x-2 cursor-pointer';

    // Check if the button is disabled
    if ($attributes->has('disabled')) {
        $classes = str_replace('cursor-pointer', 'cursor-not-allowed', $classes);
    }
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if (!$iconNone)
        @if ($iconBeforeText)
            <x-icon icon="{{ $iconType }}" class="w-4 h-4"></x-icon>
        @endif

        <span>{{ $slot }}</span>

        @if ($iconAfterText)
            <x-icon icon="{{ $iconType }}" class="w-4 h-4"></x-icon>
        @endif
    @else
        <span>{{ $slot }}</span>
    @endif
</button>