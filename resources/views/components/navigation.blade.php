<nav x-data="{ isOpen: false }" class="bg-primary-1300 shadow-md fixed top-0 z-10 w-full">
    <div class="mx-2 md:mx-14 flex justify-between items-center py-4 lg:py-4">
        <div class="flex gap-2 items-center">
            <img alt="Logo" class="w-10" height="40" src="{{ asset('assets/image/logo.png') }}" />
            <span class="text-primary-100 font-medium text-lg">Texas College Metro</span>
        </div>
        <button @click="isOpen = true" type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <x-icon icon="iconHamburger"></x-icon> 
        </button>
        <div class="hidden md:inline-flex gap-6 items-center">
            <x-nav-link :href="'#program_kami'">Program Kami</x-nav-link>
            <x-nav-link :href="'#review'">Review</x-nav-link>
            <x-nav-link :href="'#kontak'">Kontak</x-nav-link>
            <x-nav-link>Login</x-nav-link>
        </div>
        <div class="fixed top-0 right-0 z-40 w-64 h-screen pt-14 transition-transform bg-primary-1700 border-l border-l-transparent border-primary-1100 shadow-lg"
            x-show="isOpen" @click.outside="isOpen=false" x-transition x-cloack>
            <div class="flex flex-col gap-6 px-8 justify-start items-center h-full overflow-y-auto">
                <x-nav-link :href="'#program_kami'" :class="'py-2'">Program Kami</x-nav-link>
                <x-nav-link :href="'#review'" :class="'py-2'">Review</x-nav-link>
                <x-nav-link :href="'#kontak'">Kontak</x-nav-link>
                <x-nav-link :class="'py-2'">Login</x-nav-link>
            </div>
        </div>
    </div>
    {{-- Responsive --}}
</nav>
