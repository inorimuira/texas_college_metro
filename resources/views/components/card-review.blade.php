@props(['name', 'classType', 'text'])

<div {{ $attributes->merge(['class' => "flex flex-col bg-card p-6 rounded-xl gap-5 max-h-fit w-full hover:scale-110 hover:shadow-xl hover:shadow-gray-500 hover:transition cursor-default"]) }}>
    <div class="flex gap-3.5">
        <img src="{{ asset('assets/image/avatar.png') }}" class="w-14" />
        <div class="flex flex-col">
            <span class="text-primary-100">{{ $name }}</span>
            <span class="text-primary-300">{{ $classType }}</span>
        </div>
    </div>
    <div class="flex">
        <span class="text-primary-100">{{ $text }}</span>
    </div>
</div>
