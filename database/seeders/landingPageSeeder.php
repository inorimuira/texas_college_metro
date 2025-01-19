<?php

namespace Database\Seeders;

use App\Models\HeaderUtama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class landingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $header_utama = new HeaderUtama();
        $header_utama->create([
            'title' => 'Selamat Datang di Texas College Metro',
            'subtitle' => 'Temukan Kursus Murah, Berkualitas, dan Fleksibel di Texas College Metro Lampung – Pilihan Terbaik untuk Mengembangkan Keterampilan Masa Depan Anda dengan Dukungan LKP Profesional di Lampung.',
        ]);
    }
}
