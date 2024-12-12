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
            'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et tortor sit amet massa egestas interdum. Proin laoreet diam, quis justo velit facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et tortor sit amet massa egestas interdum. Proin laoreet diam, quis justo velit facilisis.',
        ]);
    }
}
