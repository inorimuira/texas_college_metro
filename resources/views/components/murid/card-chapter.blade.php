@props([
    'chapters',
])

<div class="grid grid-cols-1 gap-3">
    @foreach ($chapters as $index => $chapter)
        <div class="grid grid-cols-1 bg-white items-center gap-3 pb-4 pt-0 rounded-lg">
            <div class="flex flex-col">
                <div class="inline-flex items-center w-full gap-4">
                    <div class="w-full bg-gray-400 h-5 rounded-t-lg overflow-hidden relative">
                        <div
                            @class([
                                'rounded-t-lg bg-primary-1100 h-full relative border-2 border-primary-1600',
                                'rounded-br-lg' => !$chapter->percentage || $chapter->percentage < 100,
                            ])
                            style="width: {{ $chapter->percentage ?? 0 }}%;">
                        </div>
                        <span
                            class="absolute right-2 top-1/2 -translate-y-1/2 text-sm font-bold text-slate-800">
                            {{ $chapter->percentage ?? 0 }}%
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 bg-white items-center px-4 rounded-lg">
                <div class="flex items-center border-e-2">
                    <img src="{{ asset('assets/image/card-chapter.svg') }}" alt="card-chapter" loading="lazy"
                        class="w-12 h-12 md:w-20 md:h-20">
                    <div class="flex flex-col">
                        <span class="text-sm font-bold">Chapter {{ $loop->iteration }}</span>
                        <span class="md:text-lg lg:text-4xl font-bold">{{ $chapter->nama_chapter }}</span>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    @php
                        $previousChapterCompleted = $index == 0 ||
                            ($chapters[$index - 1]->percentage ?? 0) == 100;
                    @endphp

                    @if ($previousChapterCompleted)
                        <a wire:navigate href="{{ route('murid.course-module', ['chapterId' => $chapter->id]) }}">
                            <x-button-primary
                                type="button"
                                iconType="iconArrowRight"
                                :iconAfterText="true"
                                class="text-sm md:text-base">
                                Go to course
                            </x-button-primary>
                        </a>
                    @else
                        <x-button-primary
                            disabled
                            type="button"
                            iconType="iconDisabled"
                            :iconAfterText="true"
                            class="bg-primary-300 text-black text-sm md:text-base hover:bg-primary-300 cursor-not-allowed">
                            Go to course
                        </x-button-primary>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
