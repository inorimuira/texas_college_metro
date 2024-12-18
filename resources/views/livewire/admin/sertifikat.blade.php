<div class="w-full" x-data="{
    isGenerateSertifikat: @entangle('isGenerateSertifikat'),
    isPreviewMurid: @entangle('isPreviewMurid'),
    kelasUnggulan: true,
    kelasReguler: false,
    gradeMurid: {
        children1: false,
        children2: false,
        children3: false,
        introduction: false,
        beginner1: false,
        beginner2: true
    }
}">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Sertifikat</h1>
                    <p class="text-gray-500">Manage seluruh sertifikat murid</p>
                </div>
                <div>
                    <x-button-primary type="button" iconNone="true" class="text-sm"
                        @click="isGenerateSertifikat = true">Generate Data Sertifikat</x-button-primary>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center mb-4 relative">
                <input type="text" placeholder="Cari" wire:model.live.debounce.500ms="search"
                    class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500 pr-10 transition duration-200 ease-in-out" />
            </div>

            <!-- Table Data Murid -->
            @if ($data->isEmpty())
                <p class="text-center text-gray-600">Tidak Ada Data</p>
            @else
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-primary-300">
                            <th class="px-4 py-2 border">Nama Lengkap</th>
                            <th class="px-4 py-2 border">Grade</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td class="px-4 py-3 border text-center text-sm">{{ $item->nama }}</td>
                                <td class="px-4 py-3 border text-center text-sm">
                                        <span class="px-4 py-2 text-sm font-semibold  rounded-full">
                                            {{ $item->grade }}
                                        </span>
                                </td>
                                <td class="py-3 border text-center space-x-1">
                                    <button  class="cursor-pointer" wire:click="showPreview({{ $item->id }})">
                                        <x-icon-admin icon="iconView" fill="#000"></x-icon-admin>
                                    </button>
                                    <button class="cursor-pointer" wire:click="confirmDelete({{ $item->id }})">
                                        <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            {{-- Modal Generate Sertifikat --}}
            <div x-show="isGenerateSertifikat" x-transition x-cloak
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-max p-5 relative"
                    @click.away="isGenerateSertifikat = false">
                    <!-- Close Button -->
                    <button @click="isGenerateSertifikat = false"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                        <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                    </button>

                    <!-- Popup Header -->
                    <div class="flex items-center mb-4">
                        <h2 class="text-lg md:text-xl font-bold">Sertifikat Murid</h2>
                    </div>

                    <!-- Field Sertifikat -->
                    <div class="w-full flex flex-col">
                        <!-- Form untuk Input Data Sertifikat -->
                        <form wire:submit.prevent="generateCertificate">
                            <div class="w-full flex flex-col md:flex-row items-baseline mb-1">
                                <label class="w-1/2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="angsuran">Name</label>

                                @error('nama')
                                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                                @enderror

                                <input type="text" wire:model="nama" placeholder="ex: nama lengkap"
                                    class="w-full rounded-lg text-sm placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>

                            <div class="w-full flex flex-col md:flex-row items-baseline mb-1">
                                <label class="w-1/2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="angsuran">Tempat Lahir</label>

                                @error('tempatLahir')
                                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                                @enderror

                                <input type="text" wire:model="tempatLahir" placeholder="ex: tempat lahir"
                                    class="w-full rounded-lg text-sm placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>

                            <div class="w-full flex flex-col md:flex-row items-baseline mb-1">
                                <label class="w-1/2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="angsuran">Tanggal Lahir</label>

                                @error('tanggalLahir')
                                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                                @enderror

                                <input type="date" wire:model="tanggalLahir" class="w-full rounded-lg text-sm placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>

                            <div class="w-full flex flex-col md:flex-row items-baseline mb-1">
                                <label class="w-1/2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="angsuran">Index Number</label>

                                @error('indexSertifikat')
                                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                                @enderror

                                <input type="number" wire:model="indexSertifikat" placeholder="Masukkan idex number"
                                    class="w-full rounded-lg text-sm placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>

                            <div class="w-full flex flex-col md:flex-row items-baseline mb-1">
                                <label class="w-1/2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="angsuran">Grade</label>

                                @error('gradeMurid')
                                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                                @enderror

                                <input type="text" wire:model="gradeMurid" placeholder="Masukkan grade"
                                    class="w-full rounded-lg text-sm placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>

                            <div class="w-full flex flex-col md:flex-row items-baseline mb-1">
                                <label class="w-1/2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="angsuran">Predikat</label>

                                @error('predikatMurid')
                                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                                @enderror

                                <input type="text" wire:model="predikatMurid" placeholder="Masukkan predikat"
                                    class="w-full rounded-lg text-sm placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>

                            <div class="w-full flex flex-col md:flex-row items-baseline mb-1">
                                <label class="w-1/2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm" for="angsuran">Tanggal Dibuat</label>

                                @error('tanggalGenerate')
                                    <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                                @enderror

                                <input type="date" wire:model="tanggalGenerate" placeholder="ex: nama lengkap"
                                    class="w-full rounded-lg text-sm placeholder:text-sm bg-gray-50 border border-gray-300 text-gray-900">
                            </div>

                            <div class="flex justify-center mt-3">
                                <x-button-primary type="submit" iconNone="true" class="text-sm">
                                    Simpan
                                </x-button-primary>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Preview Murid --}}
            {{-- <div x-show="isPreviewMurid" x-transition x-cloak
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-[80vw] h-[90vh] max-h-fit p-5 relative">
                    <!-- Close Button -->
                    <button wire:click="closePreview"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                        <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                    </button>

                    <!-- Popup Header -->
                    <div class="flex items-center mb-4">
                        <h2 class="text-lg md:text-xl font-bold">Sertifikat Murid</h2>
                    </div>

                    <!-- PDF Preview -->
                    <div class="w-full h-full">
                        @if($pdfPreviewUrl)
                            <iframe src="{{ $pdfPreviewUrl }}" class="w-full h-full" frameborder="0"></iframe>
                        @else
                            <p class="text-center text-gray-600">Tidak ada pratinjau yang tersedia.</p>
                        @endif
                    </div>
                </div>
            </div> --}}

            <div x-show="isPreviewMurid" x-transition x-cloak
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-[80vw] h-[90vh] p-5 relative flex flex-col">
                    <!-- Close Button -->
                    <button wire:click="closePreview"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 cursor-pointer">
                        <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                    </button>

                    <!-- Popup Header -->
                    <div class="flex items-center mb-4">
                        <h2 class="text-lg md:text-xl font-bold">Sertifikat Murid</h2>
                    </div>

                    <!-- PDF Preview -->
                    <div class="flex-1 overflow-hidden">
                        @if($pdfPreviewUrl)
                            <iframe src="{{ $pdfPreviewUrl }}"
                            class="w-full h-full border-0" frameborder="0"></iframe>
                        @else
                            <p class="text-center text-gray-600">Tidak ada pratinjau yang tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
