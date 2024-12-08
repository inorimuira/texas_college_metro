<nav class="w-full bg-white shadow p-5 lg:p-8 flex justify-between lg:justify-end items-center top-0">
    <button class="flex justify-center mx-2 py-4 lg:hidden" @click="isSidebarOpen = !isSidebarOpen">
        <x-icon icon="iconHamburger" fill="#000"></x-icon>
    </button>
    <div class="flex items-center space-x-4">
        <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-2.21-1.79-4-4-4a4 4 0 00-8 0v3.159c0 .586-.208 1.133-.595 1.567L5 17h5m5 0a3.978 3.978 0 01-3-1m3 1a3.978 3.978 0 003-1m-6 1h6" />
            </svg>
        </button>
        <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A6.978 6.978 0 0112 15c1.757 0 3.36.63 4.621 1.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
        </button>
        <span class="text-gray-700 font-medium">Admin</span>
        <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    </div>
</nav>
