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
                <div class="flex flex-col gap-7 h-full border border-gray-400 p-2 xl:p-12 rounded-lg">
                    <div class="flex flex-col justify-between h-full divide-y divide-gray-600">
                        <div class="flex flex-col mb-4">
                            <span class="text-xl font-bold mb-4">Graded Test - Past Tense</span>
                            <div class="flex flex-col gap-4">
                                <x-murid.card-post-test attemptCount=0></x-murid.card-post-test>
                            </div>
                        </div>
                        <div class="flex gap-2 py-4">
                            <x-icon icon="iconReportIssue" fill="#5F5FFF"></x-icon>
                            <a class="text-primary-1100 font-light">Report an issue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
