<nav class="w-full bg-white shadow p-5 lg:p-8 flex justify-between lg:justify-end items-center top-0">
    <button class="flex justify-center mx-2 py-4 lg:hidden" @click="isSidebarOpen = !isSidebarOpen">
        <x-icon icon="iconHamburger" fill="#000"></x-icon>
    </button>
    <div class="flex items-center space-x-2">
        <span class="text-gray-700 font-medium">Admin</span>
        <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    </div>
</nav>
