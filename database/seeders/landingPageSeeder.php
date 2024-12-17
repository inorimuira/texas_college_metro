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
            'subtitle' => 'Belajar secara fleksibel dan terkini dengan kursus-kursus yang dirancang untuk membekali Anda dengan keterampilan masa depan. Belajar bersama komunitas global yang mendukung, dengan berbagai sumber daya untuk membantu Anda sukses.',
        ]);
    }
}
