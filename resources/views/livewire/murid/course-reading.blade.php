<div class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen overflow-hidden" x-data="{ isCourseOpen: false, isSidebarOpen: false }">

    {{-- Navbar --}}
    <x-murid.navigation></x-murid.navigation>

    <div class="mt-20 w-full h-full grid grid-cols-12" x-cloak>
        {{-- Sidebar Navigation --}}
        <x-murid.sidebar></x-murid.sidebar>

        {{-- Main Content --}}
        <div :class="isSidebarOpen ? 'col-span-full' : 'xl:col-span-11'"
            class="col-span-10 grid grid-cols-10 w-full h-full min-h-screen gap-4 p-2 md:p-4 xl:p-6">
            <div :class="isSidebarOpen ? 'col-span-full' : 'col-span-full'" class="w-full h-full">
                <div class="flex flex-col gap-7 h-full border border-gray-400 p-2 xl:p-12 rounded-lg">
                    <div class="flex flex-col divide-y divide-gray-600">
                        <div class="flex flex-col mb-4">
                            <span class="text-xl font-bold mb-4">Reading</span>
                            <div class="flex flex-col gap-3">
                                <span class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit eum
                                    alias hic sapiente eveniet dolore corporis, nesciunt beatae quasi similique sed
                                    dolores totam ipsam perspiciatis veniam iste quae a nisi dolor! Eius aliquam
                                    provident unde reprehenderit qui placeat ad non dolorum. Praesentium cupiditate at
                                    delectus minus vel quae, expedita ipsa recusandae eaque sequi ad minima ex ipsum.
                                    Vero rem at reprehenderit corrupti id, excepturi voluptatem asperiores cupiditate!
                                    Corporis ullam saepe sequi natus accusantium. Debitis rerum corporis maxime
                                    recusandae, iure dicta.</span>
                                <span class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit eum
                                    alias hic sapiente eveniet dolore corporis, nesciunt beatae quasi similique sed
                                    dolores totam ipsam perspiciatis veniam iste quae a nisi dolor! Eius aliquam
                                    provident unde reprehenderit qui placeat ad non dolorum. Praesentium cupiditate at
                                    delectus minus vel quae, expedita ipsa recusandae eaque sequi ad minima ex ipsum.
                                    Vero rem at reprehenderit corrupti id, excepturi voluptatem asperiores cupiditate!
                                    Corporis ullam saepe sequi natus accusantium. Debitis rerum corporis maxime
                                    recusandae, iure dicta.</span>
                                <span class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit eum
                                    alias hic sapiente eveniet dolore corporis, nesciunt beatae quasi similique sed
                                    dolores totam ipsam perspiciatis veniam iste quae a nisi dolor! Eius aliquam
                                    provident unde reprehenderit qui placeat ad non dolorum. Praesentium cupiditate at
                                    delectus minus vel quae, expedita ipsa recusandae eaque sequi ad minima ex ipsum.
                                    Vero rem at reprehenderit corrupti id, excepturi voluptatem asperiores cupiditate!
                                    Corporis ullam saepe sequi natus accusantium. Debitis rerum corporis maxime
                                    recusandae, iure dicta.</span>
                            </div>
                            <a href="{{ route('murid.course-module') }}" class="flex justify-end pt-4 lg:pt-6 xl:pt-8">
                                <x-button-primary iconNone="true" type="button">Mark as done</x-button-primary>
                            </a>
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
