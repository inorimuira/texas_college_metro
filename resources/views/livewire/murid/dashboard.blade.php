<div class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen overflow-hidden">
    <!-- Navbar -->
    <x-murid.navigation></x-murid.navigation>

    <!-- Dashboard Content -->
    <div class="mt-20 bg-gradient-to-r from-blue-800 to-purple-900">
        <div class="w-full p-8 md:px-20">
            <!-- Welcome Message -->
            <div class="p-6">
                <h1 class="text-4xl font-bold text-white">Welcome
                    <span class="text-highlight">{{ Auth ::user()->name}}!</span>
                </h1>
                <p class="text-lg text-white mt-2">Hope You Have a Wonderful Day</p>
            </div>

            <!-- Placement Test Reminder -->
            @if (Auth ::user()->murid->tingkat_pemahaman == null)
                <x-murid.hero-dashboard type="placement" nameCourse="Placement Test" placementTestDone="false"></x-murid.hero-dashboard>
            @endif
        </div>
    </div>

    <div class="p-8 md:p-20 h-full">
        <!-- Progress Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 h-full">
            @foreach ($chapters as $chapter)
                @php
                    // Hitung total modul dalam chapter
                    $totalModules = $chapter->modules->count();

                    // Hitung modul yang sudah diselesaikan
                    $completedModules = Auth::user()->recordCourse()
                        ->whereHas('module', function($query) use ($chapter) {
                            $query->where('chapter_id', $chapter->id);
                        })
                        ->where('status', true)
                        ->count();

                    // Hitung persentase
                    $percentage = $totalModules > 0
                        ? round(($completedModules / $totalModules) * 100)
                        : 0;

                @endphp

                @if (Auth::user()->murid->tingkat_pemahaman == null && $chapter->nama_chapter == 'Placement Test')
                    @if(Auth::user()->recordCourse->isEmpty())
                        <x-murid.card-progress
                            type="placement"
                            placementTestDone="{{ ($percentage == 100) ? 'true' : 'false' }}"
                            chapterId="{{ $chapter->id }}"
                            nameCourse="{{ $chapter->nama_chapter }}"
                            percentage="{{ $percentage }}">
                        </x-murid.card-progress>
                    @endif
                @elseif (Auth::user()->murid->tingkat_pemahaman != null)
                    @if ($chapter->nama_chapter == 'Placement Test')
                        @php
                            $placementTest = Auth::user()->recordCourse()
                                ->whereHas('module', function($query) use ($chapter) {
                                    $query->where('chapter_id', $chapter->id);
                                })->first();
                        @endphp
                        <x-murid.card-progress
                            type="placement"
                            placementTestDone="{{ ($percentage == 100) ? 'true' : 'false' }}"
                            chapterId="{{ $chapter->id }}"
                            nameCourse="{{ $chapter->nama_chapter }}"
                            percentage="{{ $percentage }}"
                            score="{{ $placementTest->score }}"
                            levelMurid="{{ Auth::user()->murid->tingkat_pemahaman }}">
                        </x-murid.card-progress>
                    @else
                        <x-murid.card-progress
                            type="course"
                            placementTestDone="{{ ($percentage == 100) ? 'true' : 'false' }}"
                            chapterId="{{ $chapter->id }}"
                            nameCourse="{{ $chapter->nama_chapter }}"
                            percentage="{{ $percentage }}">
                        </x-murid.card-progress>
                    @endif
                @endif
            @endforeach

            <!-- Learning Activity Section -->
            <div class=" bg-white rounded-lg shadow-md">
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
