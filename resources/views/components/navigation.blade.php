<div x-data="{ isOpen: false }" class="bg-primary-1300 shadow-md fixed top-0 z-10 w-full">
    <nav class="mx-2 md:mx-14 flex justify-between items-center py-4 lg:py-4">
        <div class="flex gap-2 items-center">
            <img alt="Logo" class="w-10" height="40" src="{{ asset('assets/image/logo.png') }}" alt="logo-texas-college-metro-lampung" loading="lazy"/>
            <h1 class="text-primary-100 font-medium text-lg">Texas College Metro</h1>
        </div>
        <button @click="isOpen = true" type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <x-icon icon="iconHamburger" fill="#F0F0FF"></x-icon>
        </button>
        <ul class="hidden md:inline-flex gap-6 items-center">
            <li>
                <x-nav-link href="#programTexasCollegeMetro">Program Kami</x-nav-link>
            </li>
            <li>
                <x-nav-link href="#reviewTexasCollegeMetro">Review</x-nav-link>
            </li>
            <li>
                <x-nav-link href="#kontakTexasCollegeMetro">Kontak</x-nav-link>
            </li>
            <li>
                <x-nav-link href="{{ route('login') }}">Login</x-nav-link>
            </li>
        </ul>
        {{-- Responsive --}}
        <div class="fixed top-0 right-0 z-40 w-64 h-screen pt-14 bg-primary-1700 border-l border-l-transparent border-primary-1100 shadow-lg transform transition-transform"
        :class="{'translate-x-full': !isOpen, 'translate-x-0': isOpen}"
        x-show="isOpen" @click.outside="isOpen=false" x-transition:enter="transition-transform duration-300 ease-in"
        x-transition:leave="transition-transform duration-300 ease-in"
        x-cloak>
            <ul class="flex flex-col gap-6 px-8 justify-start items-center h-full overflow-y-auto">
                <li>
                    <x-nav-link :class="'py-2'" href="#programTexasCollegeMetro">Program Kami</x-nav-link>
                </li>
                <li>
                    <x-nav-link :class="'py-2'" href="#reviewTexasCollegeMetro">Review</x-nav-link>
                </li>
                <li>
                    <x-nav-link :class="'py-2'" href="#kontakTexasCollegeMetro">Kontak</x-nav-link>
                </li>
                <li>
                    <x-nav-link :class="'py-2'" href="{{ route('login') }}">Login</x-nav-link>
                </li>
            </ul>
        </div>
        {{-- Responsive --}}
    </nav>
</div>
