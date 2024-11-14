<nav x-data="{ isSidebarOpen: false }" class="flex sm:flex items-center justify-between px-6 py-4 bg-white shadow w-full fixed top-0">
    <!-- Left section with logo and links -->
    <div class="w-full inline-flex items-center gap-8">
        <!-- Logo -->
        <img alt="Hero Banner" class="w-12 h-12" src="{{ asset('assets/image/logo.png') }}" />
        <!-- Navigation Links -->
        <a href="#" class="text-gray-800 font-medium hidden sm:block">Attendance</a>
        <a href="#" class="text-gray-800 font-medium hidden sm:block">Course</a>
        <a href="#" class="text-gray-800 font-medium hidden sm:block">Report</a>
    </div>

    <div class="items-center space-x-2 hidden md:inline-flex ">
        <img src="{{ asset('assets/image/avatar.png') }}" alt="User Icon" class="w-6 h-6">
        <span class="text-gray-800 font-medium">Fulan</span>
    </div>
    
    <button class="inline-flex md:hidden focus:ring-gray-200 rounded-md p-2" @click="isSidebarOpen = true">
        <x-icon icon="iconHamburger" fill="#33338B"></x-icon>
    </button>

    <!-- Overlay background -->
    <div x-show="isSidebarOpen" @click.outside="isSidebarOpen = false"
        x-transition:enter="transition-opacity duration-300 ease-out"
        x-transition:leave="transition-opacity duration-300 ease-in" class="fixed inset-0 bg-black opacity-50 z-30"
        x-cloak></div>

    <!-- Sidebar -->
    <div class="fixed top-0 right-0 z-40 w-64 h-screen pt-14 bg-primary-1700 border-l border-l-transparent border-primary-1100 shadow-lg transform transition-transform"
        :class="{ 'translate-x-full': !isSidebarOpen, 'translate-x-0': isSidebarOpen }" x-show="isSidebarOpen"
        @click.outside="isSidebarOpen=false" x-transition:enter="transition-transform duration-300 ease-in"
        x-transition:leave="transition-transform duration-300 ease-in" x-cloak>
        <div class="flex flex-col gap-6 px-8 justify-start items-center h-full overflow-y-auto">
            <div class="items-center space-x-2 inline-flex ">
                <img src="{{ asset('assets/image/avatar.png') }}" alt="User Icon" class="w-6 h-6">
                <span class="text-slate-300 font-medium">Fulan</span>
            </div>
            <x-nav-link class="py-2">Attendance</x-nav-link>
            <x-nav-link class="py-2">Course</x-nav-link>
            <x-nav-link class="py-2">Report</x-nav-link>
            <x-nav-link href="{{ route('logout') }}" class="py-2 text-red-500">Logout</x-nav-link>
        </div>
    </div>

</nav>
