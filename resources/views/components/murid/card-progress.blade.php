@props([
    'type' => ['course', 'placement'],
    'placementTestDone' => 'false',
    'levelMurid' => '3',
    'nameCourse',
    'chapterId',
    'percentage' => '80',
])

<div class="grid gap-8" x-data="{ isAttendanceOpen: false }" >
    <div class="p-6 bg-indigo-700 text-white rounded-lg shadow-md cursor-pointer">
        @if ($type)
            @if ($type === 'course')
                <!-- Progress Card for course -->
                <h3 class="text-base font-semibold">Finish your course</h3>
                <div class="flex items-center justify-between mt-2">
                    <h2 class="text-2xl font-bold text-highlight tracking-wide">{{ $nameCourse }}</h2>
                    <span class="text-2xl font-bold text-highlight">0%</span>
                </div>
                <div class="inline-flex items-center w-full gap-4 mt-4">
                    <div class="w-full bg-indigo-400 h-2 rounded-full overflow-hidden">
                        <div class="bg-highlight h-full" style="width: 0%;"></div>
                    </div>
                    <a href="{{ route('murid.course') }}">
                        <x-icon icon="iconArrowRight" class="w-7 h-7"></x-icon>
                    </a>
                </div>
                <div class="text-sm mt-2">
                    <span class="text-sm font-medium">Overall Progress</span>
                </div>
            @endif
            @if ($type === 'placement')
                @if ($placementTestDone === 'true')
                    <!-- Placement Test Completed -->
                    <h3 class="text-base font-semibold">You have completed Placement Test!</h3>
                    <div class="flex items-center justify-between mt-2">
                        <h2 class="text-2xl font-bold text-highlight tracking-wide">Placement Test</h2>
                        <span class="text-2xl font-bold text-highlight">100%</span>
                    </div>
                    <div class="inline-flex items-center w-full gap-4 mt-4">
                        <div class="w-full bg-indigo-400 h-2 rounded-full overflow-hidden">
                            <div class="bg-highlight h-full" style="width: 100%;"></div>
                        </div>
                    </div>
                    <span class="flex items-center gap-2 text-highlight text-xl font-bold mt-2">
                        <h3 class="text-base font-semibold text-white">Your score:</h3>
                        <span>90</span>
                    </span>
                    <span class="flex items-center gap-2 text-highlight text-xl font-bold mt-2">
                        <h3 class="text-base font-semibold text-white">You got level:</h3>
                        <span>{{ $levelMurid }}</span>
                    </span>
                @elseif ($placementTestDone === 'false')
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
                        <a wire:navigate href="{{ route('murid.placement-test', ['chapter' => $chapterId]) }}">
                            <x-icon icon="iconArrowRight" class="w-7 h-7"></x-icon>
                        </a>
                    </div>
                    <div class="text-sm mt-2">
                        <span class="text-sm font-medium">Overall Progress</span>
                    </div>
                @endif
            @endif
        @endif
    </div>
    @php
        $isAttendanceTime = true;
    @endphp

    @if ($type === 'course')
        <div class="p-6 bg-teal-200 text-white rounded-lg shadow-md flex justify-between">
            <div class="flex flex-col">
                <span class="text-2xl font-bold text-slate-800">Mark your attendance</span>
                <span class="text-slate-700">Chapter 1 : Present Tense</span>
            </div>
            <div class="flex flex-col">
                <form action="" @submit.prevent>
                    @if ($isAttendanceTime)
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
                    @if (!$isAttendanceTime)
                        <x-button-primary type="submit" iconAfterText="true" iconType="iconDisabled" :disabled="!$isAttendanceTime" class="bg-highlight hover:bg-primary-1100">
                            Attendance
                        </x-button-primary>
                    @endif
                </form>
            </div>
        </div>
    @endif
</div>
