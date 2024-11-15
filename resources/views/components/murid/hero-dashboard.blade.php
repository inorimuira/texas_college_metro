@props([
    'type' => ['course', 'placement'],
    'placementTestDone' => 'false',
])

<div class="bg-white rounded-lg shadow-lg p-8 max-w-fit">

    @if ($type)
        @if ($type === 'course')
            <h2 class="text-lg font-bold text-slate-900 mb-2">Please finish your Past Tense Course</h2>
            <p class="text-sm text-slate-600">Finish watching the video and take the post-test</p>
        @endif
        @if ($type === 'placement')
            @if ($placementTestDone === 'true')
                <h2 class="text-lg font-bold text-slate-900 mb-2">You have finished your placement test</h2>
                <p class="text-sm text-slate-600">Please check your score and level</p>
            @elseif ($placementTestDone === 'false')
                <h2 class="text-lg font-bold text-slate-900 mb-2">Please Complete Your Placement Test</h2>
                <p class="text-sm text-slate-600">The purpose of the test is to determine your level</p>
            @endif
        @endif
    @endif
</div>
