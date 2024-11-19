<div class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen overflow-hidden">
    {{-- Navbar --}}
    <x-murid.navigation></x-murid.navigation>

    {{-- Hero Content --}}
    <div class="mt-20 w-full p-8 md:px-6 xl:px-20 flex flex-col gap-6">
        <span class="text-3xl md:text-4xl font-bold">My Course</span>
        <div class="flex gap-1 md:gap-4">
            <div class="rounded-xl bg-primary-1100 py-3 px-3">
                <span class="text-sm md:text-base font-semibold text-white">In Progress</span>
            </div>
            <div class="rounded-xl bg-primary-300 py-3 px-3">
                <span class="text-sm md:text-base font-semibold text-slate-900">Completed</span>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-4 xl:gap-10 p-8 md:px-6 xl:px-20">
        {{-- Card Chapter --}}
        <div class="col-span-full grid grid-cols-1 gap-4 md:gap-8 lg:gap-12">
            <x-murid.card-chapter></x-murid.card-chapter>
        </div>
    </div>
</div>
