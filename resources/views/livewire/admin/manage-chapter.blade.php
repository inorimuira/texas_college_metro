<div class="w-full" x-data="{ isManagingModule: @entangle('isManagingModule'), isPopupOpenChapter: @entangle('isPopupOpenChapter'), isPopupOpenModule: @entangle('isPopupOpenModule'), isPopupOpenActivity: @entangle('isPopupOpenActivity'), isPopupEditSummary: @entangle('isPopupEditSummary'), selectedActivity: '' }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div x-data="{
            openChapters: {
                @foreach ($chapters as $chapter)
                    '{{ $chapter->id }}': false,
                @endforeach
            },
            toggleChapter(chapterId) {
                // Tutup semua chapter lain
                Object.keys(this.openChapters).forEach(key => {
                    if (key !== chapterId.toString()) {
                        this.openChapters[key] = false;
                    }
                });

                // Toggle chapter yang dipilih
                this.openChapters[chapterId] = !this.openChapters[chapterId];
            }
        }">
            <div x-show="!isManagingModule" x-cloak class="bg-white shadow-md rounded-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">Kelola Chapter</h1>
                        <p class="text-gray-500">Buat, hapus, dan edit chapter</p>
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
                    {{-- <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                        <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600"
                            alt="Book Icon">
                    </button> --}}
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
                                @click="toggleChapter('{{ $chapter->id }}')"
                                :class="openChapters['{{ $chapter->id }}'] ? 'bg-gray-100' : 'bg-white'">
                                <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $chapter->nama_chapter }}</h2>
                                <div class="flex space-x-2">
                                    <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                        <template x-if="openChapters['{{ $chapter->id }}']">
                                            <x-icon-admin  icon="iconDropdownCollapse" fill="#000"></x-icon-admin>
                                        </template>
                                        <template x-if="!openChapters['{{ $chapter->id }}']">
                                            <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                                        </template>
                                    </button>
                                    <button @click.stop wire:click="confirmDelete({{ $chapter->id }}, 'chapter')" class="text-red-500 hover:text-red-700 mr-2">
                                        <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                    </button>
                                </div>
                            </div>
                            <div x-show="openChapters['{{ $chapter->id }}']" x-collapse x-cloak>
                                @if ($chapter->modules->isNotEmpty())
                                    @foreach ($chapter->modules as $module)
                                        <div
                                            class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                                            <span class="ps-6">{{ $module->nama_module }}</span>
                                            <div class="flex space-x-2">
                                                <button class="text-black mr-2"
                                                    wire:click="manageModule({{ $module->id }})">
                                                    <x-icon-admin icon="iconEdit" fill="#000"></x-icon-admin>
                                                </button>
                                                <button wire:click="confirmDelete({{ $module->id }}, 'modul')" class="text-red-500 hover:text-red-700 mr-2">
                                                    <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="flex justify-center py-3">
                                    <button wire:click="modalOpenModule({{ $chapter->id }})"
                                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">Tambah
                                        Modul</button>
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
                        wire:click="clearSelectedModule"></x-button-primary>
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-xl font-bold text-gray-800">{{ $selectedModule->nama_module }}</h1>
                        </div>
                    </div>
                    <span class="text-base font-medium">Summary :</span>
                    <span>{{ $selectedModule->summary != null ? $selectedModule->summary : '' }}</span>
                    <div class="flex justify-end">
                        <x-button-secondary type="button" iconNone="true" @click="isPopupEditSummary = !isPopupEditSummary">Edit Summary</x-button-secondary>
                    </div>


                    <!-- Modules -->
                    @if ($selectedModule && $selectedModule->activityModule->isNotEmpty())
                        <div
                            x-data="{
                                openActivities: {
                                    @foreach ($selectedModule->activityModule as $activity)
                                        '{{ $activity->id }}': false,
                                    @endforeach
                                },
                                toggleActivity(activityId) {
                                    // Tutup semua aktivitas lain
                                    Object.keys(this.openActivities).forEach(key => {
                                        if (key !== activityId.toString()) {
                                            this.openActivities[key] = false;
                                        }
                                    });

                                    // Toggle aktivitas yang dipilih
                                    this.openActivities[activityId] = !this.openActivities[activityId];
                                }
                            }"
                            class="flex flex-col border rounded-md divide-y mt-4"
                        >
                            @foreach ($selectedModule->activityModule as $activity)
                                <div
                                    class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                    @click="toggleActivity({{ $activity->id }})"
                                >
                                    <h2 class="text-lg font-semibold text-gray-800 mb-2">
                                        {{ $activity->type == 'video' ? "Video" : "Reading" }}
                                    </h2>
                                    <div class="flex space-x-2" @click.stop>
                                        <button>
                                            <template x-if="openActivities['{{ $activity->id }}']">
                                                <x-icon-admin icon="iconDropdownCollapse" fill="#000"></x-icon-admin>
                                            </template>
                                            <template x-if="!openActivities['{{ $activity->id }}']">
                                                <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                                            </template>
                                        </button>
                                        <button wire:click="confirmDelete({{ $activity->id }}, 'aktivitas modul')" class="text-red-500 hover:text-red-700 mr-2">
                                            <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                        </button>
                                    </div>
                                </div>

                                <div
                                    x-show="openActivities['{{ $activity->id }}']"
                                    x-collapse
                                    x-cloak
                                >
                                    <div class="flex flex-col px-4 py-2 border-b hover:bg-gray-100">
                                        @if ($activity->type == 'video')
                                            <div class="flex gap-1 ps-4">
                                                <span class="font-medium">Judul Video :</span>
                                                <span>{{ $activity->judul }}</span>
                                            </div>
                                            <div class="flex gap-1 ps-4">
                                                <span class="font-medium">Link Video :</span>
                                                <iframe
                                                    width="560"
                                                    height="315"
                                                    src="https://www.youtube.com/embed/{{ $activity->link }}"
                                                    frameborder="0"
                                                    allowfullscreen>
                                                </iframe>
                                            </div>
                                        @elseif ($activity->type == 'reading')
                                            <div class="flex gap-1 ps-4">
                                                <span class="font-medium">Judul Aktivitas :</span>
                                                <span>{{ $activity->judul }}</span>
                                            </div>
                                            <div class="flex gap-1 ps-4">
                                                <span class="font-medium">Text :</span>
                                                <p>{{ $activity->text }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            <div class="flex justify-center py-3">
                                <x-button-primary @click="isPopupOpenActivity = true" iconNone="true" class="text-sm">
                                    Tambah Aktivitas
                                </x-button-primary>
                            </div>
                        </div>
                    @else
                        <div class="flex flex-col border rounded-md divide-y mt-4">
                            <h2 class="text-lg font-semibold text-gray-800 my-2 text-center">Tidak Ada Data</h2>
                            <div class="flex justify-center py-3">
                                <x-button-primary @click="isPopupOpenActivity = true" iconNone="true" class="text-sm">
                                    Tambah Aktivitas
                                </x-button-primary>
                            </div>
                        </div>
                    @endif
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
                    <form wire:submit.prevent="editSummary({{ $selectedModule ? $selectedModule->id : '' }})">
                        <div class="mb-4">
                            <label for="summary" class="block text-sm font-medium text-gray-700 mb-2 after:content-['*'] after:ml-0.5 after:text-red-500">Summary</label>
                            @error('summary')
                                <p class="text-red-500 text-xs mt-1 mb-1">{{ $message }}</p>
                            @enderror
                            <textarea rows="5" wire:model="summary" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                placeholder="Tulis summary di sini..."></textarea>
                        </div>
                        <!-- Submit Button -->
                        <div class="text-right">
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                Simpan
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
                            <label for="chapter_name" class="block text-sm font-medium text-gray-700 mb-2 after:content-['*'] after:ml-0.5 after:text-red-500">Nama
                                Chapter</label>
                            <input type="text" wire:model="chapter_name" placeholder="Nama chapter ex: Past-Tense"
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
                            <label for="module_name" class="block text-sm font-medium text-gray-700 mb-2 after:content-['*'] after:ml-0.5 after:text-red-500">Nama
                                Modul</label>
                            <input type="text" wire:model="module_name" placeholder="Nama Modul ex: Past-Tense I"
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
            <div x-show="isPopupOpenActivity" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50" x-cloak>
                <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative">
                    <h2 class="font-semibold mb-4">Aktivitas</h2>
                    <button @click="isPopupOpenActivity = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                        <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                    </button>

                    <form wire:submit.prevent="tambahActivity({{ $selectedModule ? $selectedModule->id : '' }})">
                        <div class="mb-4">
                            <label for="type" class="block font-semibold mb-2 after:content-['*'] after:ml-0.5 after:text-red-500">Pilih Aktivitas</label>
                            <select wire:model="type" class="w-full p-2 border border-gray-300 rounded" x-model="selectedActivity">
                                <option value="" disabled selected>Pilih aktivitas</option>
                                <option value="video">Video</option>
                                <option value="reading">Reading</option>
                            </select>
                        </div>
                        @error('type')
                            <p class="text-red-500 text-xs mt-1 mb-1">{{ $message }}</p>
                        @enderror
                        <template x-if="selectedActivity === 'video'">
                            <div class="space-y-2">
                                <div>
                                    <label for="judul_video" class="block font-semibold mb-2 after:content-['*'] after:ml-0.5 after:text-red-500">Judul Video</label>
                                    @error('judul_video')
                                        <p class="text-red-500 text-xs mt-1 mb-1">{{ $message }}</p>
                                    @enderror
                                    <input wire:model="judul_video" type="text" class="w-full p-2 text-gray-700 border border-gray-300 rounded" placeholder="Masukkan judul video">
                                </div>
                                <div>
                                    <label for="link_video" class="block font-semibold mb-2 after:content-['*'] after:ml-0.5 after:text-red-500">Link Video</label>
                                    @error('link_video')
                                        <p class="text-red-500 text-xs mt-1 mb-1">{{ $message }}</p>
                                    @enderror
                                    <input wire:model="link_video" type="url" class="w-full p-2 text-gray-700 border border-gray-300 rounded" placeholder="Masukkan link video">
                                </div>
                            </div>
                        </template>
                        <template x-if="selectedActivity === 'reading'">
                            <div class="space-y-2">
                                <div>
                                    <label for="judul_reading" class="block font-semibold mb-2 after:content-['*'] after:ml-0.5 after:text-red-500">Judul Aktivitas</label>
                                    @error('judul_reading')
                                        <p class="text-red-500 text-xs mt-1 mb-1">{{ $message }}</p>
                                    @enderror
                                    <input wire:model="judul_reading" type="text" class="w-full p-2 text-gray-700 border border-gray-300 rounded" placeholder="Masukkan judul aktivitas">
                                </div>
                                <div>
                                    <label for="text" class="block font-semibold mb-2 after:content-['*'] after:ml-0.5 after:text-red-500">Text</label>
                                    @error('text')
                                        <p class="text-red-500 text-xs mt-1 mb-1">{{ $message }}</p>
                                    @enderror
                                    <textarea wire:model="text" rows="5" class="w-full p-2 text-gray-700 border border-gray-300 rounded" placeholder="Tulis teks di sini..."></textarea>
                                </div>
                            </div>
                        </template>
                        <div class="p-4 text-right">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
