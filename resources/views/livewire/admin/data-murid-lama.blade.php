<div class="w-full" x-data="{ isPreviewMurid: false, kelasUnggulan: true, kelasReguler: false }">
    <div class="p-8">
        <!-- Manage Chapter Section -->
        <div class="bg-white shadow-md rounded-md p-6" x-cloak>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Data Murid Lama</h1>
                    <p class="text-gray-500">Kumpulan seluruh data murid</p>
                </div>
                <div class="">
                    <x-button-secondary type="button" iconNone="true" class="text-sm">Export</x-button-secondary>
                </div>
            </div>

            <!-- Search bar -->
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" placeholder="Cari"
                    class="w-3/4 lg:w-1/5 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                <button class="ml-2 p-2 bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300">
                    <img src="{{ asset('assets/image/iconFilter.svg') }}" class="h-5 w-5 text-gray-600" alt="Book Icon">
                </button>
            </div>

            <!-- Table Data Murid -->
            <table class="w-full table-auto" x-data="{  }">
                <thead class="">
                    <tr class="bg-primary-300">
                        <th class="px-4 py-2 border">Nama Lengkap</th>
                        <th class="px-4 py-2 border">NIK/NISN</th>
                        <th class="px-4 py-2 border">Asal Sekolah</th>
                        <th class="px-4 py-2 border">Program</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr class="">
                        <td class="px-4 py-3 border text-center text-sm">Henry Carnegie</td>
                        <td class="px-4 py-3 border text-center text-sm">3671092107030002</td>
                        <td class="px-4 py-3 border text-center text-sm">SMA Negeri 1 Bekasi</td>
                        <td class="py-3 border text-center text-sm">
                            <template x-if="kelasUnggulan">
                                <span class="px-4 py-2 bg-highlight text-sm text-slate-700 font-semibold rounded-full">Unggulan</span>
                            </template>
                            <template x-if="kelasReguler">
                                <span class="px-4 py-2 bg-primary-1100 text-sm text-white font-semibold rounded-full">Reguler</span>
                            </template>
                        </td>
                        <td class="py-3 border text-center space-x-1">
                            <button class="" @click="isPreviewMurid = !isPreviewMurid">
                                <x-icon-admin icon="iconView" fill="#000"></x-icon-admin>
                            </button>
                            <button class="">
                                <x-icon-admin icon="iconDelete" fill="#ef4444"></x-icon-admin>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div x-show="isPreviewMurid" x-transition x-cloak
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-max p-5 relative" @click.away="isPopupEditSummary = false">
                    <!-- Close Button -->
                    <button @click="isPreviewMurid = false"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                        <x-icon-admin icon="iconClose" fill="#000"></x-icon-admin>
                    </button>

                    <!-- Popup Header -->
                    <div class="flex items-center mb-4">
                        <h2 class="text-lg md:text-xl font-bold">Data Murid</h2>
                    </div>

                    <!-- Field Data Murid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-14 md:gap-y-3">
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Nama Lengkap
                            <span class="text-base font-normal text-gray-600">: Satria Fattan G.</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Username
                            <span class="text-base font-normal text-gray-600">: Satriaaa</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Program
                            <span class="text-base font-normal text-gray-600">
                                :
                                <template x-if="kelasUnggulan">
                                    <span class="px-4 py-2 bg-highlight text-sm text-slate-700 font-semibold rounded-full">Unggulan</span>
                                </template>
                                <template x-if="kelasReguler">
                                    <span class="px-4 py-2 bg-primary-1100 text-sm text-white font-semibold rounded-full">Reguler</span>
                                </template>
                            </span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Tanggal Lahir
                            <span class="text-base font-normal text-gray-600">: 17 November 2004</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Email
                            <span class="text-base font-normal text-gray-600">: satriafattan12@gmail.com</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Password
                            <span class="text-base font-normal text-gray-600">: ******</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            NIK/NISN
                            <span class="text-base font-normal text-gray-600">: 3671092107030002</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Alamat Domisili
                            <span class="text-base font-normal text-gray-600">: Jl. Bekasi Raya no.17</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Asal Sekolah
                            <span class="text-base font-normal text-gray-600">: SMA Negeri 1 Bekasi</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Alamat Sekolah
                            <span class="text-base font-normal text-gray-600">: Jl. Bekasi Tenggara no.1</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Nama Ayah
                            <span class="text-base font-normal text-gray-600">: Jamal Mulyadi</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Nama Ibu
                            <span class="text-base font-normal text-gray-600">: Jamil </span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            Pekerjaan Orang Tua
                            <span class="text-base font-normal text-gray-600">: Pelaut</span>
                        </span>
                        <span class="grid grid-cols-2 text-base font-medium text-gray-800 ">
                            No. Whatsapp
                            <a href="wa.me/+6289514137752" class="text-base font-normal text-indigo-500">: 089514137752</a>
                        </span>
                    </div>
                    <div class="flex justify-end mt-3">
                        <x-button-primary iconNone="true">Edit</x-button-primary>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
