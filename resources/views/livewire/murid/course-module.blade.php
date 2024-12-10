<div class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen overflow-hidden"
    x-data="{ isCourseOpen: false, isSidebarOpen: false }"
    >
    {{-- Navbar --}}
    <x-murid.navigation></x-murid.navigation>

    <div class="mt-20 w-full h-full grid grid-cols-12" x-cloak>
        {{-- Sidebar Navigation --}}
        <x-murid.sidebar :chapters="$chapters" moduleId="{{ $module->id }}"></x-murid.sidebar>

        {{-- Main Content --}}
        <div :class="isSidebarOpen ? 'col-span-full' : 'col-span-10 xl:col-span-11'" class="grid grid-cols-10 w-full h-full min-h-screen gap-4 p-2 md:p-4 xl:p-6">
            <div :class="isSidebarOpen ? 'col-span-full lg:col-span-8' : 'col-span-full lg:col-span-8'" class="w-full h-full">
                <div class="flex flex-col gap-7 h-full border border-gray-400 p-2 xl:p-12 rounded-lg">
                    <div class="flex flex-col divide-y divide-gray-600">
                        <div class="flex flex-col mb-4">
                            <span class="text-xl font-bold mb-4">{{ $module->nama_module }}</span>
                            <div class="flex gap-6">
                                <div class="flex items-center gap-2">
                                    <div class="hidden md:block rounded-full p-2 border border-gray-600">
                                        <x-icon-admin icon="iconVideo" fill="#4b5563" class="w-2.5 h-2.5"></x-icon-admin>
                                    </div>
                                    <span class="text-sm md:text-base font-semibold">
                                        1
                                        <span class="font-normal">Videos left</span>
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="hidden md:block rounded-full p-2 border border-gray-600">
                                        <x-icon-admin icon="iconReading" fill="#4b5563" class="w-2.5 h-2.5"></x-icon-admin>
                                    </div>
                                    <span class="text-sm md:text-base font-semibold">
                                        1
                                        <span class="font-normal">Reading left</span>
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="hidden md:block rounded-full p-2 border border-gray-600">
                                        <x-icon-admin icon="iconPostTest" fill="#4b5563" class="w-2.5 h-2.5"></x-icon-admin>
                                    </div>
                                    <span class="text-sm md:text-base font-semibold">
                                        1
                                        <span class="font-normal">Post Test left</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <span class="py-4 truncate text-wrap md:text-nowrap">{{ $module->summary }}</span>
                    </div>
                    <div class="flex flex-col divide-y divide-gray-600">
                        <span class="text-lg font-bold mb-4">Introduction to lesson</span>
                        <div class="flex flex-col py-4 gap-4">
                            @foreach ( $module->activityModule as $activity )
                                @if ( $activity->type == 'video' )
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('murid.course-module.video', ['activityId' => $activity->id]) }}"
                                            class="rounded-full p-2 border border-primary-1100">
                                            <x-icon-admin icon="iconVideo" fill="#5f5fff" class="w-3 h-3"></x-icon-admin>
                                        </a>
                                        <div class="flex flex-col">
                                            <a href="{{ route('murid.course-module.video', ['activityId' => $activity->id]) }}"
                                                class="text-base font-medium hover:text-primary-1100">{{ $activity->judul }}</a>
                                            <span class="text-sm">Video 2 min</span>
                                        </div>
                                    </div>
                                @elseif ( $activity->type == 'reading' )
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('murid.course-module.reading', ['activityId' => $activity->id]) }}"
                                            class="rounded-full p-2 border border-primary-1100">
                                            <x-icon-admin icon="iconReading" fill="#5f5fff" class="w-3 h-3"></x-icon-admin>
                                        </a>
                                        <div class="flex flex-col">
                                            <a href="{{ route('murid.course-module.reading', ['activityId' => $activity->id]) }}"
                                                class="text-base font-medium hover:text-primary-1100">{{ $activity->judul }}</a>
                                            <span class="text-sm">Reading</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($module->bankSoals->isNotEmpty())
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('murid.course-module.post-test.PostTest', ['moduleId' => $module->id]) }}"
                                        class="rounded-full p-2 border border-primary-1100">
                                        <x-icon-admin icon="iconPostTest" fill="#5f5fff" class="w-3 h-3"></x-icon-admin>
                                    </a>
                                    <div class="flex flex-col">
                                        <a href="{{ route('murid.course-module.post-test.PostTest', ['moduleId' => $module->id]) }}"
                                            class="text-base font-medium hover:text-primary-1100">Post Test</a>
                                        <span class="text-sm">Post Test</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-full lg:col-span-2">
                <div class="flex flex-col gap-4 h-fit border border-gray-400 p-2 xl:p-4 rounded-lg">
                    <div class="flex justify-center">
                        <span class="font-bold text-sm">Progress Tracker</span>
                    </div>
                    <div class="flex w-full gap-2">
                        <div class="w-full bg-gray-400 h-5 rounded-lg overflow-hidden">
                            <div class="rounded-lg bg-primary-1100 h-full" style="width: {{ $percentage  }}%;"></div>
                        </div>
                        <span class="text-sm font-bold text-slate-800">{{ $percentage }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

