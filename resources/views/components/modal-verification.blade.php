@props([
    'textModal' => 'Text modal',
    'textRedirect' => 'Text redirect',
    'verificationSuccess' => true,
])

@if ($verificationSuccess)
    <div tabindex="-1" x-show="isAttendanceOpen" x-cloak
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-10 flex justify-center items-center w-full md:inset-0 h-full max-h-full backdrop-blur-sm bg-black bg-opacity-50 transition-opacity duration-300"
        @click.away="isSimpanJawaban = false" x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative p-4 bg-modal rounded-lg shadow-xl">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 w-24 h-24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="#077F39E5" stroke-width="2"
                            fill="transparent" />
                        <path stroke="#077F39E5" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 12l4 4L18 8" />
                    </svg>
                    <h3 class="mb-5 text-lg font-semibold text-gray-500">{{ $textModal }}</h3>
                    <p>
                        <a href="{{ route('murid.dashboard') }}" class="text-primary-1100">{{ $textRedirect }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@elseif (!$verificationSuccess)
    <div tabindex="-1" x-show="isAttendanceOpen" x-cloak
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-10 flex justify-center items-center w-full md:inset-0 h-full max-h-full backdrop-blur-sm bg-black bg-opacity-50 transition-opacity duration-300"
        @click.away="isSimpanJawaban = false" x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative p-4 bg-modal rounded-lg shadow-xl">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 w-24 h-24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#ef4444" d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-semibold text-gray-500">{{ $textModal }}</h3>
                    <p>
                        <a href="{{ route('murid.dashboard') }}" class="text-primary-1100">{{ $textRedirect }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif
