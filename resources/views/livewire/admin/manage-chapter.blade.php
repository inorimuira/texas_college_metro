<div class="w-full" x-data="{ isChapterOpen: false, isModuleOpen: true, isManagingModule: @entangle('isManagingModule'), isPopupOpenChapter: @entangle('isPopupOpenChapter'), isPopupOpenModule: @entangle('isPopupOpenModule'), isPopupOpenActivity: false, isPopupEditSummary: false, selectedActivity: '' }">
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
                        <h1 class="text-xl font-bold text-gray-800">Kelola Chapter</h1>
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
                        class="w-3/4 lg:w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
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
                                        <template x-if="isChapterOpen">
                                            <x-icon-admin icon="iconDropdownCollapse" fill="#000"></x-icon-admin>
                                        </template>
                                        <template x-if="!isChapterOpen">
                                            <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                                        </template>
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
                                                    <x-icon-admin icon="iconEdit" fill="#000"></x-icon-admin>
                                                </button>
                                                <button class="text-red-500 hover:text-red-700 mr-2">
                                                    <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="flex justify-center py-3">
                                    <button wire:click="modalOpenModule({{ $chapter->id }})"
                                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">Tambah
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
                    <span class="">{{ $selectedModule->summarry != null ? $selectedModule->summarry : 'Belum ada summary' }}</span>
                    <div class="flex justify-end">
                        <x-button-secondary type="button" iconNone="true" @click="isPopupEditSummary = !isPopupEditSummary">Edit Summary</x-button-secondary>
                    </div>

                    <!-- Modules -->
                    <div class="flex flex-col border rounded-md divide-y mt-4">
                        <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer" @click="isModuleOpen = !isModuleOpen">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">Video 1</h2>
                            <div class="flex space-x-2">
                                <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                    <template x-if="isChapterOpen">
                                        <x-icon-admin icon="iconDropdownCollapse" fill="#000"></x-icon-admin>
                                    </template>
                                    <template x-if="!isChapterOpen">
                                        <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                                    </template>
                                </button>
                                <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                    <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
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
                            <x-button-primary @click="isPopupOpenActivity = true" iconNone="true" class="text-sm">Tambah
                                Aktifitas</x-button-primary>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Popup Edit Summary -->
            <div x-show="isPopupEditSummary" x-cloak
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative" @click.away="isPopupEditSummary = false">
                    <!-- Close Button -->
                    <button @click="isPopupEditSummary = false"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                        <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                    </button>

                    <!-- Popup Header -->
                    <div class="flex items-center mb-4">
                        <h2 class="text-lg font-semibold">Edit Summary</h2>
                    </div>

                    <!-- Form -->
                    <form wire:submit.prevent="editSummary">
                        <div class="mb-4">
                            <label for="editSummary" class="block text-sm font-medium text-gray-700 mb-2">Summary</label>
                            <textarea rows="5" wire:model="editSummary" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                placeholder="Tulis summary di sini..."></textarea>
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

            <!-- Popup Tambah Chapter -->
            <div x-show="isPopupOpenChapter" x-cloak
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative">
                    <!-- Close Button -->
                    <button @click="isPopupOpenChapter = false"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                        <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
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
                            <input type="text" wire:model="chapter_name" placeholder="Masukan nama chapter. Chapter 1 - Past Tense"
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
                        <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
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
                            <input type="text" wire:model="module_name" placeholder="Modul 1"
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
                        <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
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
                        <div class="space-y-2">
                            <div class="">
                                <label class="block font-semibold mb-2">Judul Video</label>
                                <input type="text" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                    placeholder="Masukkan judul video">
                            </div>
                            <div class="">
                                <label class="block font-semibold mb-2">Link Video</label>
                                <input type="url" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                    placeholder="Masukkan link video">
                            </div>
                        </div>
                    </template>
                    <template x-if="selectedActivity === 'Reading'">
                        <div class="space-y-2">
                            <div class="">
                                <label class="block font-semibold mb-2">Judul Reading</label>
                                <input type="text" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                    placeholder="Masukkan link video">
                            </div>
                            <div class="">
                                <label class="block font-semibold mb-2">Text</label>
                                <textarea rows="5" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                placeholder="Tulis teks di sini..."></textarea>
                            </div>
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
