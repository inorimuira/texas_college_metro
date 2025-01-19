@props(['name', 'classType', 'text'])

<div {{ $attributes->merge(['class' => "flex flex-col bg-card p-6 rounded-xl gap-5 w-full md:hover:scale-110 hover:shadow-xl hover:shadow-gray-500 md:hover:transition md:hover:cursor-pointer md:hover:translate-y-[-5px] md:hover:translate-y-[-30px]"]) }}>
    <div class="flex gap-3.5">
        <img src="{{ asset('assets/image/avatar.png') }}" class="w-14" loading="lazy" alt="avatar murid Texas College Metro Lampung"/>
        <div class="flex flex-col">
            <span class="text-white tracking-wider">{{ $name }}</span>
            <span class="text-highlight/80 tracking-wider">{{ $classType }}</span>
        </div>
    </div>
    <span class="text-primary-100 text-base font-light tracking-[0.1em]">"{{ $text }}"</span>
</div>
