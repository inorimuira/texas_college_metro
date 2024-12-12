@props([
    'type' => ['course', 'placement'],
    'placementTestDone' => 'false',
    'levelMurid',
    'nameCourse',
    'chapterId',
    'percentage',
    'score',
    'module',
    'attendance' => false
])

<div class="grid gap-8" x-data="{ isAttendanceOpen: false }" >
    <div
    @if ($type == 'placement')
        @if ($placementTestDone == 'false')
            wire:navigate href="{{ route('murid.placement-test', ['chapterId' => $chapterId]) }}"
        @endif
    @elseif ($type == 'course')
            wire:navigate href="{{ route('murid.course-module', ['chapterId' => $chapterId]) }}"
    @endif
    class="p-6 bg-indigo-700 text-white rounded-lg shadow-md cursor-pointer">
        @if ($type)
            @if ($type == 'course')
                <!-- Progress Card for course -->
                <h3 class="text-base font-semibold">Finish your course</h3>
                <div class="flex items-center justify-between mt-2">
                    <h2 class="text-2xl font-bold text-highlight tracking-wide">{{ $nameCourse }}</h2>
                    <span class="text-2xl font-bold text-highlight">{{ $percentage }}%</span>
                </div>
                <div class="inline-flex items-center w-full gap-4 mt-4">
                    <div class="w-full bg-indigo-400 h-2 rounded-full overflow-hidden">
                        <div class="bg-highlight h-full" style="width: {{ $percentage }}%;"></div>
                    </div>
                    <a href="{{ route('murid.course') }}">
                        <x-icon icon="iconArrowRight" class="w-7 h-7"></x-icon>
                    </a>
                </div>
                <div class="text-sm mt-2">
                    <span class="text-sm font-medium">Overall Progress</span>
                </div>
            @endif
            @if ($type == 'placement')
                @if ($placementTestDone == 'false')
                    <!-- Placement Test Not Completed -->
                    <h3 class="text-base font-semibold">Complete Your Test!</h3>
                    <div class="flex items-center justify-between mt-2">
                        <h2 class="text-2xl font-bold text-highlight tracking-wide">{{ $nameCourse }}</h2>
                        <span class="text-2xl font-bold text-highlight">{{ $percentage }}%</span>
                    </div>
                    <div class="inline-flex items-center w-full gap-4 mt-4">
                        <div class="w-full bg-indigo-400 h-2 rounded-full overflow-hidden">
                            <div class="bg-highlight h-full" style="width: {{ $percentage }}%;"></div>
                        </div>
                        <x-icon icon="iconArrowRight" class="w-7 h-7"></x-icon>
                    </div>
                    <div class="text-sm mt-2">
                        <span class="text-sm font-medium">Overall Progress</span>
                    </div>
                @endif
            @endif
        @endif
    </div>
    {{-- @php
        $isAttendanceTime = true;
    @endphp --}}

    @if ($type == 'course')
        <div class="p-6 bg-teal-200 text-white rounded-lg shadow-md flex justify-between">
            <div class="flex flex-col">
                <span class="text-2xl font-bold text-slate-800">Mark your attendance</span>
                <span class="text-slate-700">{{ $module['nama_module'] }}</span>
            </div>
            <div class="flex flex-col">
                    @if ($attendance)
                        <x-button-primary type="submit" iconNone="true" class="bg-highlight" @click="isAttendanceOpen = !isAttendanceOpen">
                            Attendance
                        </x-button-primary>
                        <x-modal-verification
                            xShow="isAttendanceOpen"
                            :verificationSuccess="true"
                            textModal="You have sucsesfully mark your atandance"
                            textRedirect="Kembali"
                            redirectSuccessRoute="murid.dashboard"
                            redirectFailureRoute="murid.dashboard"
                            >
                        </x-modal-verification>
                    @endif
                    @if (!$attendance)
                        <x-button-primary type="submit" iconAfterText="true" iconType="iconDisabled" :disabled="!$attendance" class="bg-highlight hover:bg-primary-1100">
                            Attendance
                        </x-button-primary>
                    @endif
            </div>
        </div>
    @endif
</div>
