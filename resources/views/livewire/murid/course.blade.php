<div class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen overflow-hidden">
    {{-- Navbar --}}
    <x-murid.navigation></x-murid.navigation>

    {{-- Hero Content --}}
    <div class="mt-20 w-full p-8 md:px-6 xl:px-20 flex flex-col gap-6">
        <span class="text-3xl md:text-4xl font-bold">My Course</span>
        <div class="flex gap-1 md:gap-4">
            <div class="rounded-xl bg-primary-1100 py-3 px-3">
                <span class="text-sm md:text-base font-semibold text-white">In Progress</span>
            </div>
            <div class="rounded-xl bg-primary-300 py-3 px-3">
                <span class="text-sm md:text-base font-semibold text-slate-900">Completed</span>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-4 xl:gap-10 p-8 md:px-6 xl:px-20">
        {{-- Card Chapter --}}
        <div class="md:col-span-2 grid grid-cols-1 gap-4 md:gap-8 lg:gap-12">
            <div class="grid grid-cols-2 bg-white items-center p-4 rounded-lg">
                <div class="flex items-center border-e-2">
                    <img src="{{ asset('assets/image/card-chapter.svg') }}" alt="card-chapter" class="w-12 h-12 md:w-20 md:h-20">
                    <div class="flex flex-col">
                        <span class="text-sm font-bold">Chapter 1</span>
                        <span class="md:text-lg lg:text-4xl font-bold">Past Tense</span>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <x-button-primary type="button" iconType="iconArrowRight" :iconAfterText="true" class="text-sm md:text-base">Go to
                        course</x-button-primary>
                </div>
            </div>
            <div class="grid grid-cols-2 bg-white items-center p-4 rounded-lg">
                <div class="flex items-center border-e-2">
                    <img src="{{ asset('assets/image/card-chapter.svg') }}" alt="card-chapter" class="w-12 h-12 md:w-20 md:h-20">
                    <div class="flex flex-col">
                        <span class="text-sm font-bold">Chapter 2</span>
                        <span class="md:text-lg lg:text-4xl font-bold">Past Tense</span>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <x-button-primary type="button" iconType="iconDisabled" :iconAfterText="true" class="bg-primary-300 text-black text-sm md:text-base">Go to
                        course</x-button-primary>
                </div>
            </div>
            <div class="grid grid-cols-2 bg-white items-center p-4 rounded-lg">
                <div class="flex items-center border-e-2">
                    <img src="{{ asset('assets/image/card-chapter.svg') }}" alt="card-chapter" class="w-12 h-12 md:w-20 md:h-20">
                    <div class="flex flex-col">
                        <span class="text-sm font-bold">Chapter 2</span>
                        <span class="md:text-lg lg:text-4xl font-bold">Past Tense</span>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <x-button-primary type="button" iconType="iconDisabled" :iconAfterText="true" class="bg-primary-300 text-black text-sm md:text-base">Go to
                        course</x-button-primary>
                </div>
            </div>
        </div>

        {{-- Weekly Goal --}}
        <div class="grid w-full place-items-center">
            <div class="bg-white flex flex-col gap-8 px-4 py-2 lg:px-8 lg:py-5 w-full lg:w-2/3 rounded-lg">
                <div class="flex flex-col gap-6">
                    <span class="text-lg font-bold">Set Your Weekly Goal!</span>
                    <span class="text-sm font-medium">Learners with goals are 75% more likely to complete their courses. Set a weekly goal now to take charge of your learning journey and boost your success!</span>
                </div>
                <div class="flex">
                    <x-button-secondary type="button" :iconNone="true">Set Your Weekly Goal</x-button-secondary>
                </div>
            </div>
        </div>
    </div>
</div>
