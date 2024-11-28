<div class="w-full">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div  x-cloak class="bg-white shadow-md rounded-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Manage Landing Page</h1>
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
                                <x-icon-admin icon="iconDropdownCollapse" fill="#000"></x-icon-admin>
                            </template>
                            <template x-if="!isSubContent">
                                <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                            </template>
                        </button>
                    </div>
                </div>
                <div class="py-2" x-show="isSubContent" x-cloak>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-6 w-1/6 text-sm">Teks Judul Utama</span>
                        <input name="" id="" type="text" placeholder="masukan judul utama disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                    </div>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-6 w-1/6 text-sm">Teks Sub-Judul</span>
                        <input name="" id="" type="text" placeholder="masukan subjudul disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                    </div>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-6 w-1/6 text-sm">Gambar Utama</span>
                        <input class="block w-full text-sm text-gray-900 rounded border border-gray-300 cursor-pointer bg-gray-50 focus:outline-none" id="file_input" type="file">
                    </div>
                    <div class="flex justify-end px-4 py-2 w-full">
                        <x-button-primary iconNone="true" class="">Simpan</x-button-primary>
                    </div>
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
                                <x-icon-admin icon="iconDropdownCollapse" fill="#000"></x-icon-admin>
                            </template>
                            <template x-if="!isSubContent">
                                <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                            </template>
                        </button>
                    </div>
                </div>
                <div class="py-2" x-show="isSubContent" x-cloak>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-6 w-1/6 text-sm">Nama Siswa</span>
                        <input name="" id="" type="text" placeholder="masukan Nama Siswa disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                    </div>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-6 w-1/6 text-sm">Kelas Siswa</span>
                        <input name="" id="" type="text" placeholder="masukan Kelas Siswa disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                    </div>
                    <div class="flex items-baseline px-4 py-2 w-full">
                        <span class="ps-6 w-1/6 text-sm">Review Siswa</span>
                        <textarea name="" id="" placeholder="masukan review siswa" class="w-full border-gray-300 rounded-md text-sm"></textarea>
                    </div>
                    <div class="flex justify-end px-4 py-2 w-full">
                        <x-button-primary iconNone="true" class="">Tambah Review</x-button-primary>
                    </div>
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
                                <x-icon-admin icon="iconDropdownCollapse" fill="#000"></x-icon-admin>
                            </template>
                            <template x-if="!isSubContent">
                                <x-icon-admin icon="iconDropdownExpand" fill="#000"></x-icon-admin>
                            </template>
                        </button>
                    </div>
                </div>
                <div class="py-2" x-show="isSubContent" x-cloak>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-6 w-1/6 text-sm">Maps</span>
                        <input name="" id="" type="url" placeholder="masukan link maps disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                    </div>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-6 w-1/6 text-sm">Instagram</span>
                        <input name="" id="" type="url" placeholder="masukan link instagram disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                    </div>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-6 w-1/6 text-sm">Whatsapp</span>
                        <input name="" id="" type="url" placeholder="masukan link api whatsapp disini" class="w-full border-gray-300 rounded-md text-sm"></input>
                    </div>
                    <div class="flex items-center px-4 py-2 w-full">
                        <span class="ps-6 w-1/6 text-sm">Email</span>
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
                <div class="py-2" x-show="isSubContent" x-cloak>
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
