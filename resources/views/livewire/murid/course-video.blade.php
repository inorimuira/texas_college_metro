<div class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen overflow-hidden" x-data="{ isCourseOpen: false, isSidebarOpen: false }">

    {{-- Navbar --}}
    <x-murid.navigation></x-murid.navigation>

    <div class="mt-20 w-full h-full grid grid-cols-12" x-cloak>
        {{-- Sidebar Navigation --}}
        <x-murid.sidebar></x-murid.sidebar>

        {{-- Main Content --}}
        <div :class="isSidebarOpen ? 'col-span-full' : 'xl:col-span-11'"
            class="col-span-10 grid grid-cols-10 w-full h-full min-h-screen gap-4 p-2 md:p-4 xl:p-6">
            <div :class="isSidebarOpen ? 'col-span-full' : 'col-span-full'"
                class="w-full h-full">
                <x-murid.layout-course-lesson
                    titleLesson="Introduction to Past Tense"
                    courseVideo="true"
                >
                </x-murid.layout-course-lesson>
            </div>
        </div>
    </div>
</div>
