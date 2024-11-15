<div x-data="{ isCourseOpen: false, isSidebarOpen: true }" class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen overflow-hidden">
    {{-- Navbar --}}
    <x-murid.navigation></x-murid.navigation>

    <div class="mt-20 w-full grid grid-cols-12">
        {{-- Sidebar Navigation --}}
        <x-murid.sidebar></x-murid.sidebar>

        {{-- Main Content --}}
        <div :class="isSidebarOpen ? 'col-span-8' : 'col-span-9'" class="md:py-6 md:px-10">
            <div class="flex flex-col gap-7 h-full border border-gray-400 xl:p-12 rounded-lg">
                <div class="flex flex-col divide-y divide-gray-600">
                    <div class="flex flex-col mb-4">
                        <span class="text-xl font-bold mb-4">Introduction to Past Tense</span>
                        <div class="flex gap-6">
                            <div class="flex items-center gap-2">
                                <div class="rounded-full p-2 border border-gray-600">
                                    <x-icon icon="iconVideo" fill="#4b5563" class="w-2.5 h-2.5"></x-icon>
                                </div>
                                <span class="font-semibold">
                                    20 Min
                                    <span class="font-normal">of Videos left</span>
                                </span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="rounded-full p-2 border border-gray-600">
                                    <x-icon icon="iconReading" fill="#4b5563" class="w-2.5 h-2.5"></x-icon>
                                </div>
                                <span class="font-semibold">
                                    1 H
                                    <span class="font-normal">of Reading left</span>
                                </span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="rounded-full p-2 border border-gray-600">
                                    <x-icon icon="iconPostTest" fill="#4b5563" class="w-2.5 h-2.5"></x-icon>
                                </div>
                                <span class="font-semibold">
                                    1
                                    <span class="font-normal">Post Test left</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <span class="py-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores rem velit in fuga! Doloribus
                        doloremque omnis magnam blanditiis aspernatur tempore minima architecto nesciunt veniam quaerat
                        dignissimos nemo, numquam distinctio suscipit sit temporibus facilis minus repudiandae
                        praesentium aliquid culpa! Illum deserunt eaque vel ex nemo! Magni velit cumque iure fuga
                        nostrum a molestiae repellat saepe cupiditate sequi recusandae explicabo obcaecati quaerat sed
                        ipsa voluptatibus officia suscipit fugiat, accusamus tenetur temporibus at. Aspernatur quos eius
                        soluta fuga incidunt. Voluptatum ducimus iure, minima quasi ex dolores facere corporis
                        reiciendis asperiores beatae quod et exercitationem ipsam recusandae expedita modi enim vitae
                        veritatis blanditiis facilis nam. Labore expedita fugiat amet earum at temporibus sunt, numquam
                        fuga maxime quam officia exercitationem nulla. Aliquid asperiores corporis placeat tenetur
                        doloribus laudantium dignissimos, vitae, reprehenderit quos sunt cumque laborum temporibus
                        eligendi dolores esse eius expedita enim, odit distinctio id reiciendis officiis sit ducimus
                        fugiat? Nulla commodi tempore sit ullam?</span>
                </div>
                <div class="flex flex-col divide-y divide-gray-600">
                    <span class="text-lg font-bold mb-4">Introduction to lesson</span>
                    <div class="flex flex-col py-4 gap-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('murid.dashboard') }}" class="rounded-full p-2 border border-primary-1100">
                                <x-icon icon="iconVideo" fill="#5f5fff" class="w-3 h-3"></x-icon>
                            </a>
                            <div class="flex flex-col">
                                <a href="{{ route('murid.dashboard') }}" class="text-base font-medium hover:text-primary-1100">Introduction to past tense</a>
                                <span class="text-sm">Video 2 min</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('murid.dashboard') }}" class="rounded-full p-2 border border-primary-1100">
                                <x-icon icon="iconVideo" fill="#5f5fff" class="w-3 h-3"></x-icon>
                            </a>
                            <div class="flex flex-col">
                                <a href="{{ route('murid.dashboard') }}" class="text-base font-medium hover:text-primary-1100">Introduction to past tense</a>
                                <span class="text-sm">Video 2 min</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('murid.dashboard') }}" class="rounded-full p-2 border border-primary-1100">
                                <x-icon icon="iconReading" fill="#5f5fff" class="w-3 h-3"></x-icon>
                            </a>
                            <div class="flex flex-col">
                                <a href="{{ route('murid.dashboard') }}" class="text-base font-medium hover:text-primary-1100">Introduction to past tense</a>
                                <span class="text-sm">Reading</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('murid.dashboard') }}" class="rounded-full p-2 border border-primary-1100">
                                <x-icon icon="iconPostTest" fill="#5f5fff" class="w-3 h-3"></x-icon>
                            </a>
                            <div class="flex flex-col">
                                <a href="{{ route('murid.dashboard') }}" class="text-base font-medium hover:text-primary-1100">Discussion Form</a>
                                <span class="text-sm">Discussion</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Weekly Goal Progress Tracker --}}
        <div class="col-span-2 md:py-6 md:pe-4">
            <div class= "h-fit border border-gray-400 xl:p-4 xl:py-12 rounded-lg flex flex-col gap-2">
                <span class="text-base font-semibold text-center">Weekly Goal Progress Tracker</span>
                <div class="flex flex-col gap-2">
                    <div class="flex flex-wrap justify-center gap-1">
                        <div class="border border-primary-500 rounded-full px-[10px] py-[5px] text-sm text-primary-500 place-items-center hover:bg-primary-500 hover:text-slate-800">
                            <span class="">M</span>
                        </div>
                        <div class="border border-primary-500 rounded-full px-[10px] py-[4px] text-sm text-primary-500 place-items-center hover:bg-primary-500 hover:text-slate-800">
                            <span class="">T</span>
                        </div>
                        <div class="border border-primary-500 rounded-full px-[10px] py-[4px] text-sm text-primary-500 place-items-center hover:bg-primary-500  hover:text-slate-800">
                            <span class="">W</span>
                        </div>
                        <div class="border border-primary-500 rounded-full px-[10px] py-[4px] text-sm text-primary-500 place-items-center hover:bg-primary-500  hover:text-slate-800">
                            <span class="">T</span>
                        </div>
                        <div class="border border-primary-500 rounded-full px-[10px] py-[4px] text-sm text-primary-500 place-items-center hover:bg-primary-500  hover:text-slate-800">
                            <span class="">F</span>
                        </div>
                        <div class="border border-red-300 rounded-full px-[10px] py-[4px] text-sm text-red-400 place-items-center">
                            <span class="">S</span>
                        </div>
                        <div class="border border-red-300 rounded-full px-[10px] py-[4px] text-sm text-red-400 place-items-center">
                            <span class="">S</span>
                        </div>
                    </div>
                    <span class="text-primary-1300">Edit my goal</span>
                </div>
            </div>
        </div>
    </div>
</div>
