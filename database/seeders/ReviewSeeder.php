<?php

namespace Database\Seeders;

use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $review = [
            [
                'nama' => "Henry Carnegie",
                'grade' => "Intermediate I",
                'review' => "Saya sangat senang dengan kelas ini, karena saya bisa belajar dengan mudah dan menyenangkan. Saya sangat terhibur dan tertarik dengan materi yang diulas. Saya sangat puas dengan pengajar yang ramah dan sopan. Terima kasih!",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => "Fadhil Firoos",
                'grade' => "Advanced",
                'review' => "Menurut saya, kelas ini sangat membantu saya dalam memahami konsep matematika. Materi yang diulas sangat jelas dan mudah dipahami. Saya sangat puas dengan pengajar yang ramah dan sopan. Terima kasih!",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => "Inori Muira Sitanggang",
                'grade' => "Children",
                'review' => "Keren 👍",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        Review::insert($review);
    }
}
