<div class="w-full">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div  x-cloak class="bg-white shadow-md rounded-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Kelola Landing Page</h1>
                    <p class="text-gray-500">Atur content pada halaman awal website</p>
                </div>
            </div>

            <!-- Header Utama -->
            <div class="flex flex-col border rounded-md divide-y mb-3" x-data="{ isSubContent: false }">
                <div @click="isSubContent = !isSubContent"
                    class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer rounded-t-md"
                    :class="{ 'bg-transparent': !isSubContent, 'bg-slate-700 hover:bg-slate-800': isSubContent }">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2"
                        :class="{ 'text-white': isSubContent }">
                        Header Utama
                    </h2>
                    <div class="flex space-x-2">
                        <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                            <template x-if="isSubContent">
                                <x-icon-admin icon="iconDropdownCollapse" fill="#fff"></x-icon-admin>
                            </template>
                            <template x-if="!isSubContent">
                                <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                            </template>
                        </button>
                    </div>
                </div>
                <div class="py-2 w-full" x-show="isSubContent" x-cloak x-collapse>
                    <form wire:submit.prevent="ubahHeaderUtama({{ $id ?? null }})">
                        <div class="flex items-baseline px-4 py-2 w-full">
                            <span class="ps-1 lg:ps-6 w-full lg:w-1/6 text-sm">Teks Judul Utama</span>
                            <input wire:model="judul_utama" type="text" placeholder="masukan judul utama disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                        </div>
                        <div class="flex items-baseline px-4 py-2 w-full">
                            <span class="ps-1 lg:ps-6 w-full lg:w-1/6 text-sm">Teks Sub-Judul</span>
                            <textarea wire:model="sub_judul" type="text" placeholder="masukan subjudul disini" class="w-full h-24 border-gray-300 rounded-md text-sm">{{ $sub_judul ?? null }}</textarea>

                        </div>
                        <div class="flex items-baseline px-4 py-2 w-full">
                            <span class="ps-1 lg:ps-6 w-full lg:w-1/6 text-sm">Gambar Utama</span>
                            <input wire:model="gambar_utama" class="block w-full text-sm text-gray-900 rounded border border-gray-300 cursor-pointer bg-gray-50 focus:outline-none" id="file_input" type="file">
                        </div>

                        <div class="flex justify-end px-4 py-2 w-full">
                            <x-button-primary iconNone="true" type="submit">Simpan</x-button-primary>
                        </div>
                    </form>

                    @if ($gambar != null)
                        <div class="flex items-baseline py-2 w-full">
                            <span class="ps-1 lg:ps-6 w-full lg:w-1/6 text-sm"></span>
                            <img alt="Logo" class="w-2/12 h-2/12" height="40" src="{{ asset('storage/landingPage/' . $gambar) }}" loading="lazy"/>

                            <button wire:click="confirmDelete({{ $id }})" class="text-red-500 hover:text-red-700">
                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Review -->
            <div class="flex flex-col border rounded-md divide-y mb-3" x-data="{ isSubContent: false }">
                <div @click="isSubContent = !isSubContent"
                    class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer rounded-t-md"
                    :class="{ 'bg-transparent': !isSubContent, 'bg-slate-700 hover:bg-slate-800': isSubContent }">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2"
                        :class="{ 'text-white': isSubContent }">
                        Review
                    </h2>
                    <div class="flex space-x-2">
                        <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                            <template x-if="isSubContent">
                                <x-icon-admin icon="iconDropdownCollapse" fill="#fff"></x-icon-admin>
                            </template>
                            <template x-if="!isSubContent">
                                <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                            </template>
                        </button>
                    </div>
                </div>
                <div class="py-2 w-full" x-show="isSubContent" x-cloak x-collapse>
                    <form wire:submit.prevent="tambahReview()">
                        <div class="flex items-center px-4 py-2 w-full">
                            <span class="ps-1 lg:ps-6 w-full lg:w-1/6 text-sm">Nama Murid</span>
                            <input wire:model="nama_murid" type="text" placeholder="masukan Nama Murid disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                        </div>
                        <div class="flex items-center px-4 py-2 w-full">
                            <span class="ps-1 lg:ps-6 w-full lg:w-1/6 text-sm">Kelas Murid</span>
                            <input wire:model="grade_murid" type="text" placeholder="masukan Kelas Murid disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                        </div>
                        <div class="flex items-baseline px-4 py-2 w-full">
                            <span class="ps-1 lg:ps-6 w-full lg:w-1/6 text-sm">Review Murid</span>
                            <textarea wire:model="review_murid" placeholder="masukan review Murid" class="w-full border-gray-300 rounded-md text-sm"></textarea>
                        </div>
                        <div class="flex justify-end px-4 py-2 w-full">
                            <x-button-primary iconNone="true" type="submit">Tambah Review</x-button-primary>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Kontak -->
            <div class="flex flex-col border rounded-md divide-y mb-3" x-data="{ isSubContent: false }">
                <div @click="isSubContent = !isSubContent"
                    class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer rounded-t-md"
                    :class="{ 'bg-transparent': !isSubContent, 'bg-slate-700 hover:bg-slate-800': isSubContent }">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2"
                        :class="{ 'text-white': isSubContent }">
                        Kontak
                    </h2>
                    <div class="flex space-x-2">
                        <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                            <template x-if="isSubContent">
                                <x-icon-admin icon="iconDropdownCollapse" fill="#fff"></x-icon-admin>
                            </template>
                            <template x-if="!isSubContent">
                                <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                            </template>
                        </button>
                    </div>
                </div>
                <div class="py-2 w-full" x-show="isSubContent" x-cloak x-collapse>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-1 lg:ps-6 w-full lg:w-1/6 text-sm">Maps</span>
                        <input name="" id="" type="url" placeholder="masukan link maps disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                    </div>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-1 lg:ps-6 w-full lg:w-1/6 text-sm">Instagram</span>
                        <input name="" id="" type="url" placeholder="masukan link instagram disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                    </div>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-1 lg:ps-6 w-full lg:w-1/6 text-sm">Whatsapp</span>
                        <input name="" id="" type="url" placeholder="masukan link api whatsapp disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                    </div>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-1 lg:ps-6 w-full lg:w-1/6 text-sm">Email</span>
                        <input name="" id="" type="text" placeholder="masukan email disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                    </div>
                    <div class="flex justify-end px-4 py-2 w-full">
                        <x-button-primary iconNone="true" class="">Simpan</x-button-primary>
                    </div>
                </div>
            </div>

            {{-- <!-- Program Kami -->
            <div class="flex flex-col border rounded-md divide-y mb-3" x-data="{ isSubContent: false }">
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-100 cursor-pointer" @click="isSubContent = !isSubContent">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Program Kami</h2>
                    <div class="flex space-x-2">
                        <button class="text-yellow-500 hover:text-yellow-700 mr-2">
                            <template x-if="isSubContent">
                                <x-icon-admin icon="iconDropdownCollapse" fill="#000"></x-icon-admin>
                            </template>
                            <template x-if="!isSubContent">
                                <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                            </template>
                        </button>
                    </div>
                </div>
                <div class="py-2" x-show="isSubContent" x-cloak >
                    <div class="flex flex-col items-center px-4 py-2 w-full">
                        <span class="ps-6 w-full text-base font-semibold mb-2">Kelas Reguler</span>
                        <div class="flex items-center w-full ps-2 mb-2">
                            <span class="ps-6 w-1/6 text-sm">Kelas Reguler</span>
                            <input name="" id="" type="text" placeholder="masukan judul utama disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                        </div>
                        <div class="flex items-center w-full ps-2 mb-2">
                            <span class="ps-6 w-1/6 text-sm">Teks Sub-Judul</span>
                            <input name="" id="" type="text" placeholder="masukan subjudul disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                        </div>
                        <div class="flex items-center w-full ps-2 mb-2">
                            <span class="ps-6 w-1/6 text-sm">Gambar Kelas Reguler</span>
                            <input class="block w-full text-sm text-gray-900 rounded border border-gray-300 cursor-pointer bg-gray-50 focus:outline-none h-fit" id="file_input" type="file">
                        </div>
                    </div>
                    <div class="flex flex-col items-center px-4 py-2 w-full">
                        <span class="ps-6 w-full text-base font-semibold mb-2">Kelas Unggulan</span>
                        <div class="flex items-center w-full ps-2 mb-2">
                            <span class="ps-6 w-1/6 text-sm">Kelas Reguler</span>
                            <input name="" id="" type="text" placeholder="masukan judul utama disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                        </div>
                        <div class="flex items-center w-full ps-2 mb-2">
                            <span class="ps-6 w-1/6 text-sm">Teks Sub-Judul</span>
                            <input name="" id="" type="text" placeholder="masukan subjudul disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                        </div>
                        <div class="flex items-center w-full ps-2 mb-2">
                            <span class="ps-6 w-1/6 text-sm">Gambar Kelas Reguler</span>
                            <input class="block w-full text-sm text-gray-900 rounded border border-gray-300 cursor-pointer bg-gray-50 focus:outline-none h-fit" id="file_input" type="file">
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('refreshComponent', () => {
            Livewire.emit('refresh');
        });
    </script>
@endpush
