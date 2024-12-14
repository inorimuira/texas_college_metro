<nav class="w-full bg-white shadow p-5 lg:p-8 relative flex justify-between lg:justify-end items-center top-0">
    <button class="flex justify-center mx-2 py-4 lg:hidden" @click="isSidebarOpen = !isSidebarOpen">
        <x-icon icon="iconHamburger" fill="#000"></x-icon>
    </button>
    <div class="flex items-center space-x-2 " x-data="{ isSubMenu: true }">
        <span class="text-gray-700 font-medium">Admin</span>
        <button class="text-gray-500 hover:text-gray-700 focus:outline-none" @click="isSubMenu = !isSubMenu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div class="absolute right-[2%] top-3/4 rounded-b-lg bg-white/85 ps-10 pb-6 pe-3 transition-shadow shadow-xl" x-show="isSubMenu" x-collapse x-transition x-cloak>
            <!-- Logout -->
            <a href="{{ route('logout') }}"
                class="flex items-center py-3 px-4 bg-red-200 text-red-900 font-medium hover:bg-red-200 transition rounded-md">
                <x-icon-admin icon="iconLogout" fill="#b91c1c" class="mr-2"></x-icon-admin>
                Logout
            </a>
        </div>
    </div>
</nav>
