<div x-data="{ isModalOpen: @entangle('isModalOpen'), isSimpanJawaban: @entangle('isSimpanJawaban') }" class="bg-placement-test">
    {{-- Navbar --}}
    <x-murid.navigation-tes typeTest="Placement Test"></x-murid.navigation-tes>

    {{-- Main Content --}}
    <div class="flex justify-center w-full p-6 md:p-12">
        <div class="bg-gray-300 bg-opacity-20 w-full md:w-full xl:w-3/4 rounded-lg p-4 md:p-8 border border-gray-300">
            <form wire:submit.prevent="submit">
                @foreach ($chapters as $chapter)
                    @foreach ($chapter->modules as $module)
                        @foreach ($module->bankSoals as $bankSoal)
                            <x-murid.layout-soal :errors="$errors" id="{{ $bankSoal->id }}" nomorSoal="{{ $loop->iteration }}" pertanyaan="{{ $bankSoal->question }}" opsi1="{{ $bankSoal->a }}" opsi2="{{ $bankSoal->b }}" opsi3="{{ $bankSoal->c }}" opsi4="{{ $bankSoal->d }}" />
                        @endforeach
                    @endforeach
                @endforeach
                <div class="col-span-2 flex justify-end mt-6">
                    <x-button-primary type="button" :iconNone="true" @click="isModalOpen = true">Submit</x-button-primary>
                </div>
                <x-modal-warning type="simpanJawaban"></x-modal-warning>
            </form>
        </div>
    </div>
</div>
