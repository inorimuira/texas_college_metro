@props(['iconType', 
        'iconBeforeText'=>false, 
        'iconAfterText'=>false])

@if ($iconBeforeText || $iconAfterText)
    @if ($iconBeforeText)
        <a
            {{ $attributes->merge(['class' => 'flex items-center px-4 py-2 bg-primary-1100 hover:bg-primary-1300 hover:transition text-white rounded-lg gap-x-2 cursor-pointer']) }}>
            <x-icon icon="{{ $iconType }}" class="w-4 h-4"></x-icon>
            <span>{{ $slot }}</span>
        </a>
    @endif
    @if ($iconAfterText)
        <a
            {{ $attributes->merge(['class' => 'flex items-center px-4 py-2 bg-primary-1100 hover:bg-primary-1300 hover:transition text-white rounded-lg gap-x-2 cursor-pointer']) }}>
            <span>{{ $slot }}</span>
            <x-icon icon="{{ $iconType }}" class="w-4 h-4"></x-icon>
        </a>
    @endif
@endif
