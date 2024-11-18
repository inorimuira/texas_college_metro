@props([
    'dueDate' => '12 Desember 2024',
    'attemptCount' => 0,
    'submitDate' => '15 Desember 2024',
])

<div class="flex flex-col gap-4 bg-primary-300 px-8 py-6 rounded-lg">
    <span class="font-semibold text-lg text-slate-800">Assigment Details</span>
    <div class="flex flex-col md:flex-row md:justify-between">
        <div class="flex flex-wrap items-start gap-4 md:gap-12">
            <div class="flex flex-col">
                <span class="font-semibold text-slate-700">Due</span>
                <span class="text-slate-700 text-sm md:text-base">{{ $dueDate }}</span>
            </div>
            @if ($attemptCount == 0)
                <div class="flex flex-col justify-center items-center">
                    <span class="font-semibold text-slate-700">Attempts</span>
                    <span class="text-slate-700 text-sm md:text-base">{{ $attemptCount }}</span>
                </div>
            @elseif ($attemptCount > 0)
                <div class="flex flex-col justify-center items-center">
                    <span class="font-semibold text-slate-700">Attempts</span>
                    <span class="text-slate-700 text-sm md:text-base">{{ $attemptCount }}</span>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <span class="font-semibold text-slate-700">Submitted at</span>
                    <span class="text-slate-700 text-sm md:text-base">{{ $submitDate }}</span>
                </div>
            @endif
        </div>
        @if ($attemptCount == 0)
            <div class="flex-justify-end">
                <a href="{{ route('murid.course-module.post-test.PostTest') }}">
                    <x-button-primary iconNone="true">Attempt</x-button-primary>
                </a>
            </div>
        @elseif ($attemptCount > 0)
            <div class="flex justify-end">
                <a href="">
                    <x-button-primary disabled type="button" :iconNone="true" class="bg-slate-500"
                        fill="#fff">Attempt</x-button-primary>
                </a>
            </div>
        @endif
    </div>
</div>
@if ($attemptCount == 0)
    <div class="flex flex-col gap-4 border border-primary-1100 px-8 py-6 rounded-lg">
        <span class="font-semibold text-lg text-slate-800">Your Grade</span>
        <span class="font-medium text-sm md:text-base text-slate-700">You haven’t submitted this yet. We keep your
            highest
            score.</span>
    </div>
@else
    <div class="lg:flex justify-between items-center border bg-teal-200 px-8 py-6 rounded-lg">
        <div class="flex flex-col">
            <span class="mb-2 font-semibold text-lg text-slate-800">Your Grade</span>
            <span class="mb-2 font-medium text-sm md:text-base text-slate-700">To pass this post test, you need at least 70%.
                We keep your
                highest score.</span>
            <span class="text-2xl md:text-4xl font-bold">85.50%</span>
        </div>
        <a class="flex" href="">
            <span class="text-primary-1100 font-semibold">View Submission</span>
        </a>
    </div>
@endif
