<div class="w-full" x-data="{ isChapterOpen: false, isModuleOpen: false, isManagingModule: @entangle('isManagingModule'), isPopupOpenChapter: @entangle('isPopupOpenChapter'), isPopupOpenModule: @entangle('isPopupOpenModule'), isPopupOpenActivity: false, selectedActivity: '' }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div x-data="{
            openChapters: {
                @foreach ($chapters as $chapter)
                    '{{ $chapter->id }}': false, @endforeach
            },
            currentOpenChapter: null,
            toggleChapter(chapterId) {
                if (this.currentOpenChapter === chapterId) {
                    this.openChapters[chapterId] = !this.openChapters[chapterId];
                    this.currentOpenChapter = this.openChapters[chapterId] ? chapterId : null;
                } else {
                    // Close the currently opened chapter
                    if (this.currentOpenChapter) {
                        this.openChapters[this.currentOpenChapter] = false;
                    }
                    // Open the new chapter
                    this.openChapters[chapterId] = true;
                    this.currentOpenChapter = chapterId;
                }
            }
        }">
            <div x-show="!isManagingModule" x-cloak class="bg-white shadow-md rounded-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">Manage Chapter</h1>
                        <p class="text-gray-500">Buat, hapus, dan edit soal</p>
                    </div>
                    <div>
                        <button @click="isPopupOpenChapter = true"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Tambah
                            Chapter</button>
                    </div>
                </div>

                <!-- Search bar -->
                <div class="flex items-center space-x-2 mb-4">
                    <input type="text" placeholder="Cari"
                        class="w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                    <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                        <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600"
                            alt="Book Icon">
                    </button>
                </div>

                <!-- Chapters -->
                @if ($chapters->isEmpty())
                    <div class="border rounded-md divide-y">
                        <div class="flex justify-center items-center px-4 py-2 hover:bg-gray-100 cursor-pointer">
                            <h2 class="text-lg font-semibold text-gray-600">Tidak Ada Data</h2>
                        </div>
                    </div>
                @else
                    @foreach ($chapters as $chapter)
                        <div class="flex flex-col border rounded-md divide-y">
                            <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                @click="toggleChapter('{{ $chapter->id }}')">
                                <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $chapter->nama_chapter }}</h2>
                                <div class="flex space-x-2">
                                    <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                        <img src="{{ asset('assets/image/breakdownIcon.svg') }}" class="h-5 w-5"
                                            alt="Breakdown Icon">
                                    </button>
                                </div>
                            </div>
                            <div x-show="openChapters['{{ $chapter->id }}']" x-cloak>
                                @php
                                    $chapterModules = $modules->where('chapters_id', $chapter->id);
                                @endphp

                                @if ($chapterModules->isNotEmpty())
                                    @foreach ($chapterModules as $module)
                                        <div
                                            class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                                            <span class="ps-6">{{ $module->nama_module }}</span>
                                            <div class="flex space-x-2">
                                                <button class="text-black mr-2"
                                                    wire:click="manageModule({{ $module->id }})">
                                                    <svg version="1.1" id="Icons"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"
                                                        xml:space="preserve" width="20  px" height="20px">
                                                        <path fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            d="M11.3,26.5L4,28l1.5-7.3L21.6,4.5c0.8-0.8,2.1-0.8,2.9,0l2.9,2.9c0.8,0.8,0.8,2.1,0,2.9L11.3,26.5z" />
                                                        <line fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            x1="18.7" y1="7.5" x2="24.5"
                                                            y2="13.3" />
                                                    </svg>
                                                </button>
                                                <button class="text-red-500 hover:text-red-700 mr-2">
                                                    <svg fill="currentColor" width="20px" height="20px"
                                                        viewBox="0 0 36 36" version="1.1"
                                                        preserveAspectRatio="xMidYMid meet"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <path class="clr-i-outline clr-i-outline-path-1"
                                                            d="M27.14,34H8.86A2.93,2.93,0,0,1,6,31V11.23H8V31a.93.93,0,0,0,.86,1H27.14A.93.93,0,0,0,28,31V11.23h2V31A2.93,2.93,0,0,1,27.14,34Z">
                                                        </path>
                                                        <path class="clr-i-outline clr-i-outline-path-2"
                                                            d="M30.78,9H5A1,1,0,0,1,5,7H30.78a1,1,0,0,1,0,2Z"></path>
                                                        <rect class="clr-i-outline clr-i-outline-path-3" x="21" y="13"
                                                            width="2" height="15"></rect>
                                                        <rect class="clr-i-outline clr-i-outline-path-4" x="13" y="13"
                                                            width="2" height="15"></rect>
                                                        <path class="clr-i-outline clr-i-outline-path-5"
                                                            d="M23,5.86H21.1V4H14.9V5.86H13V4a2,2,0,0,1,1.9-2h6.2A2,2,0,0,1,23,4Z">
                                                        </path>
                                                        <rect x="0" y="0" width="36" height="36"
                                                            fill-opacity="0" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="flex justify-center py-3">
                                    <button wire:click="modalOpenModule({{ $chapter->id }})"
                                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Tambah
                                        Module</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Manage Module Section -->
            @if ($selectedModule != null)
                <div x-show="isManagingModule" x-cloak class="bg-white shadow-md rounded-md p-6">
                    <x-button-primary iconBeforeText="true" iconType="iconArrowLeft" class="mb-3"
                        @click="isManagingModule = !isManagingModule"></x-button-primary>
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-xl font-bold text-gray-800">{{ $selectedModule->nama_module }}</h1>
                        </div>
                    </div>
                    <span class="text-base font-medium">Summary : </span>
                    <span
                        class="">{{ $selectedModule->summarry != null ? $selectedModule->summarry : '' }}</span>
                    <form class="flex flex-col gap-3">
                        <textarea name=""
                            class="min-h-10 items-start bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-slate-400"></textarea>
                        <div class="flex justify-end">
                            <x-button-secondary type="submit" iconNone="true">Save Summary</x-button-secondary>
                        </div>
                    </form>

                    <!-- Modules -->
                    <div class="flex flex-col border rounded-md divide-y mt-4">
                        <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">Video 1</h2>
                            <div class="flex space-x-2">
                                <button class="text-yellow-500 hover:text-yellow-700 mr-2"
                                    @click="isModuleOpen = !isModuleOpen">
                                    <img src="{{ asset('assets/image/breakdownIcon.svg') }}" class="h-5 w-5"
                                        alt="Breakdown Icon">
                                </button>
                                <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                    <img src="{{ asset('assets/image/iconDelete.svg') }}" class="h-5 w-5"
                                        alt="Delete Icon">
                                </button>
                            </div>
                        </div>
                        <div class="" x-show="isModuleOpen" x-cloak>
                            <div class="flex flex-col px-4 py-2 border-b hover:bg-gray-100">
                                <div class="flex gap-1 ps-4">
                                    <span class="font-medium">Judul Video :</span>
                                    <span class="">Introduction to Past Tense</span>
                                </div>
                                <div class="flex gap-1 ps-4">
                                    <span class="font-medium">Link Video :</span>
                                    <a class="text-primary-1100" href="www.youtube.com">link to youtube video</a>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center py-3">
                            <x-button-primary @click="isPopupOpenActivity = true" iconNone="true">Tambah
                                Aktifitas</x-button-primary>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Popup Tambah Chapter -->
            <div x-show="isPopupOpenChapter" x-cloak
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative">
                    <!-- Close Button -->
                    <button @click="isPopupOpenChapter = false"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                        <span class="material-icons">close</span>
                    </button>

                    <!-- Popup Header -->
                    <div class="flex items-center mb-4">
                        <h2 class="text-lg font-semibold">Tambah Chapter</h2>
                    </div>

                    <!-- Form -->
                    <form wire:submit.prevent="tambahChapter">
                        <div class="mb-4">
                            <label for="chapter_name" class="block text-sm font-medium text-gray-700 mb-2">Nama
                                Chapter</label>
                            <input type="text" wire:model="chapter_name" placeholder="Masukkan nama chapter"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" />
                        </div>
                        <!-- Submit Button -->
                        <div class="text-right">
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Popup Tambah Modul -->
            <div x-show="isPopupOpenModule" x-cloak
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative">
                    <!-- Close Button -->
                    <button @click="isPopupOpenModule = false"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                        <span class="material-icons">close</span>
                    </button>

                    <!-- Popup Header -->
                    <div class="flex items-center mb-4">
                        <h2 class="text-lg font-semibold">Tambah Modul</h2>
                    </div>

                    <!-- Form -->
                    <form wire:submit.prevent="tambahModule">
                        <div class="mb-4">
                            <label for="module_name" class="block text-sm font-medium text-gray-700 mb-2">Nama
                                Modul</label>
                            <input type="text" wire:model="module_name" placeholder="Masukkan nama modul"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" />
                        </div>
                        <!-- Submit Button -->
                        <div class="text-right">
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                Oke
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Popup Tambah Aktivitas -->
            <div x-show="isPopupOpenActivity"
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50" x-cloak>
                <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative">
                    <h2 class="font-semibold mb-4">Aktifitas</h2>
                    <button @click="isPopupOpenActivity = false"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                        <img src="{{ asset('assets/image/closeIcon.png') }}" class="h-5 w-5" alt="Close Icon">
                    </button>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2">Pilih Aktifitas</label>
                        <select class="w-full p-2 border border-gray-300 rounded" x-model="selectedActivity">
                            <option value="" disabled selected>Pilih aktifitas</option>
                            <option value="Video">Video</option>
                            <option value="Reading">Reading</option>
                        </select>
                    </div>
                    <template x-if="selectedActivity === 'Video'">
                        <div>
                            <label class="block font-semibold mb-2">Link Video</label>
                            <input type="url" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                placeholder="Masukkan link video">
                        </div>
                    </template>
                    <template x-if="selectedActivity === 'Reading'">
                        <div>
                            <label class="block font-semibold mb-2">Text Area</label>
                            <textarea rows="5" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                placeholder="Tulis teks di sini..."></textarea>
                        </div>
                    </template>
                    <div class="p-4 text-right">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
