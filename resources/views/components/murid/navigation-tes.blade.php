{{-- Navigation untuk semua halaman tes --}}

<div class="w-full flex justify-between items-center px-6 py-4 bg-slate-300 bg-opacity-50">
    <div class="inline-flex items-center gap-4">
        <a class="border rounded-full border-black p-2" href="{{ route('murid.dashboard') }}">
            <x-icon icon="iconArrowLeft" fill="#000"></x-icon>
        </a>
        <span class="text-xl font-bold tracking-wide">Placement Test</span>
    </div>
    <div class="items-center space-x-2 hidden md:inline-flex ">
        <img src="{{ asset('assets/image/avatar.png') }}" alt="User Icon" class="w-6 h-6">
        <span class="text-gray-800 font-medium">Fulan</span>
    </div>
    <button class="inline-flex md:hidden focus:ring-gray-200 rounded-md p-2" @click="isSidebarOpen = true">
        <x-icon icon="iconHamburger" fill="#33338B"></x-icon>
    </button>
</div>
