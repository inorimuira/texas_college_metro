@props([
    'title',
    'type',
    'link',
    'text'
])

<div class="flex flex-col gap-7 h-full border border-gray-400 p-2 xl:p-12 rounded-lg">
    <div class="flex flex-col justify-between h-full divide-y divide-gray-600">
        <div class="flex flex-col mb-4">
            <div class="flex items-center mb-4">
                <a href="{{ url()->previous() }}" class="flex items-center p-2 text-blue-600 hover:bg-blue-100 rounded-full transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5">
                        <path fill="#000" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
                    </svg>
                </a>
                <span class="text-xl font-bold ml-2">{{ $title }}</span>
            </div>
            @if ($type === 'video')
                <div class="relative w-full" style="padding-bottom: 56.25%;"> <!-- 16:9 Aspect Ratio -->
                    <iframe class="absolute top-0 left-0 w-full h-full"
                            src="https://www.youtube.com/embed/{{ $link }}"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                </div>
            @elseif ($type === 'reading')
                <div class="flex flex-col gap-3">
                    <span class="text-justify">
                        {{ $text }}
                    </span>
                </div>
            @endif
        </div>
    </div>
</div>
