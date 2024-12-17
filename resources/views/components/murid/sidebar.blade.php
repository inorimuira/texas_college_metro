@props(['chapters', 'moduleId'])

<div x-show="isSidebarOpen"
x-transition:enter="transition-opacity duration-300 ease-out"
x-transition:leave="transition-opacity duration-300 ease-in" class="fixed inset-0 bg-black opacity-50 z-10"
x-cloak></div>

<aside :class="isSidebarOpen ? 'fixed w-1/2 md:w-1/4' : 'xl:col-span-1'"
    class="col-span-2 z-20 flex flex-col gap-4 px-3 md:px-3 xl:px-8 py-6 h-full border-e border-e-gray-400 bg-primary-1100"
    x-transition x-cloak
    @click.outside="isSidebarOpen=false"
    >
    <div :class="isSidebarOpen ? 'justify-between' : 'justify-center'"
        class="flex items-center lg:mb-6">
        <span class="text-lg md:text-xl font-bold text-center text-white" x-show="isSidebarOpen">Activity Board</span>
        <div class="cursor-pointer" @click="isSidebarOpen = !isSidebarOpen">
            <template x-if="!isSidebarOpen">
                <x-icon icon="iconHamburger" fill="#fff"></x-icon>
            </template>
            <template x-if="isSidebarOpen">
                <x-icon icon="iconMinimize" fill="#fff"></x-icon>
            </template>
        </div>
    </div>

    <div class="flex flex-col xl:flex-row xl:items-center gap-1" x-show="isSidebarOpen" x-collapse x-cloak>
        <span class="text-base md:text-lg font-medium text-white">{{ $chapters->nama_chapter }}</span>
        {{-- <span class="hidden xl:block text-lg font-medium text-white">-</span>
        <span class="text-sm gap-1 font-bold text-highlight">Past Tense</span> --}}
    </div>

    <div class="flex flex-col gap-3" x-show="isSidebarOpen" x-collapse x-cloak>
        <div class="flex items-center gap-2 cursor-pointer" @click="isCourseOpen = !isCourseOpen">
            <span class="text-lg font-medium text-white">Course</span>
            <template x-if="isCourseOpen">
                <x-icon-admin icon="iconDropdownCollapse" fill="#fff" class="w-3 h-3"></x-icon-admin>
            </template>
            <template x-if="!isCourseOpen">
                <x-icon-admin icon="iconDropdownExpand" fill="#fff" class="w-3 h-3"></x-icon-admin>
            </template>
        </div>
        <div class="flex flex-col gap-3" x-show="isCourseOpen" x-collapse x-cloak>
            @foreach ( $chapters->modules as $module )
                <span class="flex items-center gap-2 cursor-pointer" wire:click="changeModule({{ $module->id }})">
                    <span class="rounded-full w-4 h-4 border-2 border-highlight {{ $moduleId == $module->id ? 'bg-highlight' : '' }}"></span>
                    <span class="text-base text-white">{{ $module->nama_module }}</span>
                </span>
            @endforeach
            {{-- <a class="flex items-center gap-2">
                <span class="rounded-full w-4 h-4 border-2 border-highlight"></span>
                <span class="text-base text-white">Module 2</span>
            </a>
            <a class="flex items-center gap-2">
                <span class="rounded-full w-4 h-4 border-2 border-highlight"></span>
                <span class="text-base text-white">Module 3</span>
            </a>
            <a class="flex items-center gap-2" href="{{ route('murid.course-module.post-test') }}">
                <span class="rounded-full w-4 h-4 border-2 border-highlight"></span>
                <span class="text-base text-white">Post Test</span>
            </a> --}}
        </div>
    </div>
</aside>
