@props(['cardTitle', 'cardContent'])

<div
    class="flex bg-primary-300 justify-between p-3 md:p-6 gap-2 rounded-xl hover:scale-110 hover:transition cursor-default">
    <div class="flex flex-col">
        <span class="text-secondary text-sm md:text-base font-bold">{{ $cardTitle }} -</span>
        <a class="text-primary-2100 text-sm md:text-base font-extrabold md:pe-6"
                    href="https://maps.app.goo.gl/xjjQBJi9ZsxCS6nA9">{{ $cardContent }}</a>
    </div>
    <div class="bg-primary-1600 p-2 md:p-4 max-h-fit rounded-xl">
        {{ $slot }}
    </div>
</div>
