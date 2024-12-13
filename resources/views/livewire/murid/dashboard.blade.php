@php
    $module = $chapters->modules->firstWhere('record_course', null)->only(['id', 'nama_module'])
@endphp

<div class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen overflow-hidden">
    <!-- Navbar -->
    <x-murid.navigation></x-murid.navigation>

    <!-- Dashboard Content -->
    <div class="mt-20 bg-gradient-to-r from-blue-800 to-purple-900">
        <div class="w-full p-8 md:px-20">
            <!-- Welcome Message -->
            <div class="p-6">
                <h1 class="text-4xl font-bold text-white">Welcome
                    <span class="text-highlight">{{ Auth::user()->name }}!</span>
                </h1>
                <p class="text-lg text-white mt-2">Hope You Have a Wonderful Day</p>
                @if (Auth::user()->murid->tingkat_pemahaman != null)
                    <span class="text-lg text-white mt-2">Your level :
                        <span class="text-highlight font-semibold">{{ Auth::user()->murid->tingkat_pemahaman }}</span>
                    </span>
                @endif
            </div>

            <!-- Placement Test Reminder -->
            @if (Auth::user()->murid->tingkat_pemahaman == null)
                <x-murid.hero-dashboard
                    type="placement"
                    nameCourse="Placement Test"
                    placementTestDone="false">
                </x-murid.hero-dashboard>
            @endif
        </div>
    </div>

    <div class="p-8 md:p-20 h-full">
        <!-- Progress Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 h-full">
            @if ($chapters != null)
                @if (Auth::user()->murid->tingkat_pemahaman == null)
                    {{-- Untuk placement test --}}
                    @if ($chapters->nama_chapter == 'Placement Test' && $percentage != 100)
                        <x-murid.card-progress
                            type="placement"
                            placementTestDone="false"
                            chapterId="{{ $chapters->id }}"
                            nameCourse="{{ $chapters->nama_chapter }}"
                            percentage="{{ $percentage }}">
                        </x-murid.card-progress>
                    @endif
                @else
                    @if ($chapters->nama_chapter != 'Placement Test' && $percentage != 100)
                        <x-murid.card-progress
                            type="course"
                            placementTestDone="false"
                            chapterId="{{ $chapters->id }}"
                            nameCourse="{{ $chapters->nama_chapter }}"
                            percentage="{{ $percentage }}"
                            :module="$module">
                        </x-murid.card-progress>
                    @endif
                @endif
            @endif

            <!-- Learning Activity Section -->
            <div class="bg-white rounded-lg shadow-md">
                <span class="inline-flex items-center mb-4 gap-2 p-6 w-full border-b-[1px]">
                    <x-icon icon="iconLearningActivity" fill="#33338B"></x-icon>
                    <h3 class="text-xl font-bold">Learning Activity</h3>
                </span>
                <div class="space-y-4 px-6">
                    <!-- Activity Card -->
                    <x-murid.card-activity type="placement"></x-murid.card-activity>
                    <x-murid.card-activity type="placement"></x-murid.card-activity>
                    <div class="text-right text-blue-500 pb-4">
                        <button class="text-sm font-semibold">More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
