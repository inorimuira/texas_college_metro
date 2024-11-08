@props(['kelasReguler'=>false, 'kelasUnggulan'=>false])

@if ($kelasReguler || $kelasUnggulan)
    @if ($kelasReguler)
        <form method="POST" class="w-full grid grid-cols-2 col-span-2 gap-2 md:gap-4">
            @csrf
            <x-input-text textReguler="true" required="true">Nama Lengkap</x-input-text>
            <x-input-text textReguler="true" required="true">Email</x-input-text>
            <x-input-text textReguler="true" required="true">Username</x-input-text>
            <x-input-text textReguler="true" required="true">Password</x-input-text>
            <x-input-text textReguler="true" required="true">Nomor Whatsapp</x-input-text>
            <x-input-date required="true">Tanggal Lahir</x-input-date>
            <x-input-text textReguler="true" required="true">NIK/NISN Siswa</x-input-text>
            <x-input-text textReguler="true" required="true">Asal Sekolah</x-input-text>
            <x-input-text textReguler="true" required="true">Nama Ayah</x-input-text>
            <x-input-text textReguler="true" required="true">Pekerjaan Ayah</x-input-text>
            <x-input-text textReguler="true" required="true">Nama Ibu</x-input-text>
            <x-input-text textReguler="true" required="true">Pekerjaan Ibu</x-input-text>
            <x-input-text textArea="true" required="true">Alamat Domisili</x-input-text>
            <x-input-text textArea="true" required="true">Alamat Sekolah</x-input-text>
            <div class="col-span-2 flex justify-end mt-6">
                <x-button-primary type="submit" href="{{ route('Pembayaran', ['kelasReguler' => true]) }}" iconType="iconArrowRight"
                    :iconAfterText="true">Simpan</x-button-primary>
            </div>
        </form>
    @endif
    @if ($kelasUnggulan)
        <form method="POST" class="w-full grid grid-cols-2 col-span-2 gap-2 md:gap-4">
            @csrf
            <x-input-text textReguler="true" required="true">Nama Lengkap</x-input-text>
            <x-input-text textReguler="true" required="true">Email</x-input-text>
            <x-input-text textReguler="true" required="true">Username</x-input-text>
            <x-input-text textReguler="true" required="true">Password</x-input-text>
            <x-input-text textReguler="true" required="true">Nomor Whatsapp</x-input-text>
            <x-input-date required="true">Tanggal Lahir</x-input-date>
            <x-input-text textReguler="true" required="true">NIK/NISN Siswa</x-input-text>
            <x-input-text textReguler="true" required="true">Asal Sekolah</x-input-text>
            <x-input-text textReguler="true" required="true">Nama Ayah</x-input-text>
            <x-input-text textReguler="true" required="true">Pekerjaan Ayah</x-input-text>
            <x-input-text textReguler="true" required="true">Nama Ibu</x-input-text>
            <x-input-text textReguler="true" required="true">Pekerjaan Ibu</x-input-text>
            <x-input-text textArea="true" required="true">Alamat Domisili</x-input-text>
            <x-input-text textArea="true" required="true">Alamat Sekolah</x-input-text>
            <x-input-text textReguler="true" required="true">Keperluan Khusus</x-input-text>
            <div class="col-span-2 flex justify-end mt-6">
                <x-button-primary type="submit" href="{{ route('Pembayaran', ['kelasUnggulan' => true]) }}" iconType="iconArrowRight"
                    :iconAfterText="true">Simpan</x-button-primary>
            </div>
        </form>
    @endif
@endif
