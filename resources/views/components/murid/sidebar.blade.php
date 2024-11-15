<aside :class="isSidebarOpen ? 'col-span-2' : 'col-span-1'" class="flex flex-col gap-4 px-8 py-6 bg-transparent h-full border-e border-e-gray-400" x-cloak>
    <div :class="isSidebarOpen ? 'justify-between' : 'justify-center'" class="flex items-center lg:mb-6">
        <span class="text-xl font-bold text-center" x-show="isSidebarOpen">Activity Board</span>
        <div class="" @click="isSidebarOpen = !isSidebarOpen">
            <template x-if="isSidebarOpen">
                <x-icon icon="iconMinimize" fill="#000"></x-icon>
            </template>
            <template x-if="!isSidebarOpen">
                <x-icon icon="iconHamburger" fill="#000"></x-icon>
            </template>
        </div>
    </div>

    <div class="flex items-center gap-1" x-show="isSidebarOpen" x-collapse x-cloak>
        <span class="text-lg font-medium">Chapter 1</span>
        <span class="text-lg font-medium">-</span>
        <span class="text-sm gap-1 text-primary-1100 font-bold">Past Tense</span>
    </div>

    <div class="flex flex-col gap-3" x-show="isSidebarOpen" x-collapse x-cloak>
        <div class="flex items-center gap-2 cursor-pointer" @click="isCourseOpen = !isCourseOpen">
            <span class="text-lg font-medium">Course</span>
            <template x-if="isCourseOpen">
                <x-icon icon="iconDropdownCollapse" fill="#000" class="w-3 h-3"></x-icon>
            </template>
            <template x-if="!isCourseOpen">
                <x-icon icon="iconDropdownExpand" fill="#000" class="w-3 h-3"></x-icon>
            </template>
        </div>
        <div class="flex flex-col gap-3" x-show="isCourseOpen" x-collapse x-cloak>
            <div class="flex items-center gap-2">
                <span class="rounded-full w-4 h-4 border border-primary-1100"></span>
                <span class="text-base">Module 1</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="rounded-full w-4 h-4 border border-primary-1100"></span>
                <span class="text-base">Module 2</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="rounded-full w-4 h-4 border border-primary-1100"></span>
                <span class="text-base">Module 3</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="rounded-full w-4 h-4 border border-primary-1100"></span>
                <span class="text-base">Post Test</span>
            </div>
        </div>
    </div>
</aside>
