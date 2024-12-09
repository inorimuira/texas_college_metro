<div class="w-full" x-data="{ isModuleOpen: @entangle('isModuleOpen'), isTambahSoal: @entangle('isTambahSoal') }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div x-show="!isModuleOpen" class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Bank Soal</h1>
                    <p class="text-gray-500">Kelola seluruh soal untuk kursus</p>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari"
                    class="w-3/4 lg:w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                {{-- <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                    <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600" alt="Book Icon">
                </button> --}}
            </div>

            <!-- Chapters -->
            <div class="flex flex-col border rounded-md divide-y" x-data="{
                isChapterOpen: {
                    @foreach ($chapters as $chapter)
                        '{{ $chapter->id }}': false,
                    @endforeach
                },
                toggleChapter(chapterId) {
                    // Jika chapter yang sama ditekan, toggle status
                    if (this.isChapterOpen[chapterId]) {
                        this.isChapterOpen[chapterId] = false;
                    } else {
                        // Reset semua chapter menjadi tertutup
                        Object.keys(this.isChapterOpen).forEach(key => {
                            this.isChapterOpen[key] = false;
                        });

                        // Buka chapter yang dipilih
                        this.isChapterOpen[chapterId] = true;
                    }
                }
            }">
                @foreach ($chapters as $chapter)
                    <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                        @click="toggleChapter('{{ $chapter->id }}')">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $chapter->nama_chapter }}</h2>
                        <div class="flex space-x-2">
                            <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                <template x-if="isChapterOpen['{{ $chapter->id }}']">
                                    <x-icon-admin icon="iconDropdownCollapse" fill="#000"></x-icon-admin>
                                </template>
                                <template x-if="!isChapterOpen['{{ $chapter->id }}']">
                                    <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                                </template>
                            </button>
                        </div>
                    </div>
                    @foreach ($chapter->modules as $module)
                        <div x-show="isChapterOpen['{{ $chapter->id }}']" x-collapse x-cloak>
                            <div class="flex justify-between items-center px-4 py-2 border-b hover:bg-gray-100">
                                <span class="ps-6">{{ $module->nama_module }}</span>
                                <div class="flex space-x-2">
                                    <button class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
                                        wire:click="selectModule({{ $module->id }})">Kelola Soal</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

        <!-- Manage Soal Section -->
        <div x-show="isModuleOpen" class="bg-white shadow-md rounded-md p-6" x-cloak>
            <x-button-primary iconBeforeText="true" iconType="iconArrowLeft" class="mb-3"
                wire:click="clearSelectedModule"></x-button-primary>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Kelola Soal</h1>
                    <p class="text-gray-500">Buat, hapus, dan edit soal</p>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari"
                    class="w-3/4 lg:w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                {{-- <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                    <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600" alt="Book Icon">
                </button> --}}
            </div>

            <!-- Soal -->
            <div class="flex flex-col border rounded-md divide-y mb-4" x-data="{ isModalSoalOpen: false }">
                @if ($selectedModule != null)
                    <div class="flex justify-between items-center px-4 py-2 rounded-t-md bg-slate-800">
                        <h2 class="text-lg font-semibold mb-2 text-white">
                            {{ $selectedModule->nama_module }}
                        </h2>

                        @if ($selectedModule && $selectedModule->bankSoals->isNotEmpty())
                            <div class="flex space-x-2">
                                <button class="px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition"
                                    wire:click="confirmDelete({{ $selectedModule->id }}, 'Semua Soal')">Hapus Semua Soal</button>
                            </div>
                        @endif
                    </div>
                    <!-- Konten Soal -->
                    <div>
                        <!-- Soal -->
                        @if ($selectedModule && $selectedModule->bankSoals->isEmpty())
                            <div class="flex flex-col items-center px-4 py-4 border-b hover:bg-gray-100 gap-4">
                                <h2 class="text-lg font-semibold text-gray-600">Tidak Ada Data</h2>
                            </div>
                        @else
                            @foreach ($selectedModule->bankSoals as $soal)
                                <div class="flex flex-col items-center px-4 py-4 border-b hover:bg-gray-100 gap-4"
                                    x-data="{ isPreviewSoalOpen: false }">
                                    <div class="ps-6 flex justify-between w-full cursor-pointer" @click="isPreviewSoalOpen = !isPreviewSoalOpen">
                                        <h2 class="text-lg font-semibold text-gray-600">Soal {{ $loop->iteration }}</h2>
                                        <div class="flex space-x-2">
                                            <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                                                <template x-if="isPreviewSoalOpen">
                                                    <x-icon-admin icon="iconDropdownCollapse" fill="#000"></x-icon-admin>
                                                </template>
                                                <template x-if="!isPreviewSoalOpen">
                                                    <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                                                </template>
                                            </button>
                                            <button @click.stop wire:click="confirmDelete({{ $soal->id }}, 'Soal')" class="text-red-500 hover:text-red-700 mr-2">
                                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-full space-y-4" x-show="isPreviewSoalOpen" x-collapse>
                                        <div class="w-full ps-6 ">
                                            <span class="font-semibold">{{ $soal->question }}</span>
                                        </div>
                                        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-3 ps-6">
                                            <span
                                                class="w-full {{ $soal->answer ==  $soal->a ? 'before:text-white before:content-["✓"] before:border-emerald-600 before:bg-emerald-600 before:px-[0.2rem]' : 'before:border-gray-400 before:px-2.5' }} before:border-2  before:rounded-full before:me-1">A.
                                                {{ $soal->a }}</span>
                                            <span
                                                class="w-full {{ $soal->answer ==  $soal->b ? 'before:text-white before:content-["✓"] before:border-emerald-600 before:bg-emerald-600 before:px-[0.2rem]' : 'before:border-gray-400 before:px-2.5' }} before:border-2  before:rounded-full before:me-1">B.
                                                {{ $soal->b }}</span>
                                            <span
                                                class="w-full {{ $soal->answer ==  $soal->c ? 'before:text-white before:content-["✓"] before:border-emerald-600 before:bg-emerald-600 before:px-[0.2rem]' : 'before:border-gray-400 before:px-2.5' }} before:border-2  before:rounded-full before:me-1">C.
                                                {{ $soal->c }}</span>
                                            <span
                                                class="w-full {{ $soal->answer ==  $soal->d ? 'before:text-white before:content-["✓"] before:border-emerald-600 before:bg-emerald-600 before:px-[0.2rem]' : 'before:border-gray-400 before:px-2.5' }} before:border-2  before:rounded-full before:me-1">D.
                                                {{ $soal->d }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <!-- Tombol Tambah Soal -->
                        <div class="flex justify-center px-4 py-2">
                            <x-button-primary type="button" iconNone="true" class="text-sm"
                                @click="isTambahSoal = !isTambahSoal">
                                Tambah Soal
                            </x-button-primary>
                        </div>
                    </div>

                    {{-- Modal Tambah Soal --}}
                    <div x-show="isTambahSoal"
                        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50" x-transition x-cloak>
                        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-5 relative">
                            <h2 class="font-semibold mb-4">Soal {{ $selectedModule->bankSoals->count() + 1 }}</h2>
                            <button @click="isTambahSoal = false"
                                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                                <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                            </button>
                            <form wire:submit.prevent="tambahSoal({{ $selectedModule->id }})" class="mb-4 space-y-3">
                                <div>
                                    <label for="question" class="block font-semibold mb-2">Pertanyaan</label>
                                    <textarea type="text" wire:model="question" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                        placeholder="Masukkan pertanyaan dengan lengkap"> </textarea>
                                </div>
                                <div class="w-full border p-6 space-y-2">
                                    <label class="block font-semibold mb-2">Jawaban</label>
                                    <span class="flex gap-2 items-center">
                                        A.
                                        <input type="text" wire:model="optionA" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                        placeholder="Masukkan opsi jawaban ke-1 ">
                                    </span>
                                    <span class="flex gap-2 items-center">
                                        B.
                                        <input type="text" wire:model="optionB" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                        placeholder="Masukkan opsi jawaban ke-2 ">
                                    </span>
                                    <span class="flex gap-2 items-center">
                                        C.
                                        <input type="text" wire:model="optionC" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                        placeholder="Masukkan opsi jawaban ke-3 ">
                                    </span>
                                    <span class="flex gap-2 items-center">
                                        D.
                                        <input type="text" wire:model="optionD" class="w-full p-2 text-gray-700 border border-gray-300 rounded"
                                        placeholder="Masukkan opsi jawaban ke-4 ">
                                    </span>
                                </div>
                                <div class="w-full border p-6 space-y-2">
                                    <label class="block font-semibold mb-2">Jawaban Benar</label>
                                    <select wire:model="answerCorrect" class="w-full p-2 text-gray-700 border border-gray-300 rounded">
                                        <option value="">Pilih Jawaban</option>
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>
                                        <option value="d">D</option>
                                    </select>
                                </div>
                                <div class="p-4 text-right">
                                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
