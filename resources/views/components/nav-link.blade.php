@props(['active' => false, 'href' => '#'])

@php
    $classes = ($active ?? false)
        ? "text-primary-100 inline-flex items-center px-1 text-sm font-medium leading-5 text-primary-70 focus:outline-none focus:border-warning-70 transition duration-150 ease-in-out cursor-pointer"
        : "text-primary-100 hover:text-primary-2100 inline-flex items-center px-1 text-sm font-medium leading-5 text-primary-70 focus:outline-none focus:border-warning-70 transition duration-150 ease-in-out";
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
