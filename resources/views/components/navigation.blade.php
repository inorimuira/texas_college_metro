<nav x-data="{ isOpen: false }" class="bg-primary-1300 shadow-md sticky top-0 z-10 w-full">
    <div class="mx-14 flex justify-between items-center py-4 lg:py-4">
        <div class="flex gap-2 items-center">
            <img alt="Logo" class="w-10" height="40" src="{{ asset('assets/image/logo.png') }}" />
            <span class="text-primary-100 font-medium text-lg">Texas College Metro</span>
        </div>
        <button @click="isOpen = true" type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <svg class="w-6 h-6" aria-hidden="true" fill="#F0F0FF" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>
        <div class="hidden md:inline-flex gap-6 items-center">
            <x-nav-link :href="'#program_kami'">Program Kami</x-nav-link>
            <x-nav-link :href="'#tentang_kami'">Tentang Kami</x-nav-link>
            <x-nav-link>Login</x-nav-link>
        </div>
        <div class="fixed top-0 right-0 z-40 w-64 h-screen pt-14 transition-transform bg-primary-1700 border-r border-primary-1100 shadow-lg"
            x-show="isOpen" @click.outside="isOpen=false" x-transition x-cloack>
            <div class="flex flex-col gap-6 px-8 justify-start items-center h-full overflow-y-auto">
                <x-nav-link :href="'#program_kami'" :class="'py-2'">Program Kami</x-nav-link>
                <x-nav-link :href="'#tentang_kami'" :class="'py-2'">Tentang Kami</x-nav-link>
                <x-nav-link :class="'py-2'">Login</x-nav-link>
            </div>
        </div>
    </div>
    {{-- Responsive --}}
</nav>
