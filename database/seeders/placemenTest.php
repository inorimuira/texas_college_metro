<?php

namespace Database\Seeders;

use App\Models\BankSoal;
use App\Models\Chapter;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class placemenTest extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $now = Carbon::now();

        $chapter = Chapter::create([
            'nama_chapter' => 'Placement Test',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $module = $chapter->modules()->create([
            'nama_module' => 'Placement Test',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        $questions = [
            [
                'question' => 'Apa kepanjangan dari HTML?',
                'a' => 'Hyper Text Markup Language',
                'b' => 'High Tech Modern Language',
                'c' => 'Hyperlink and Text Markup Language',
                'd' => 'Home Tool Markup Language',
                'answer' => 'Hyper Text Markup Language',
            ],
            [
                'question' => 'Bahasa pemrograman apa yang biasa digunakan untuk membuat website dinamis?',
                'a' => 'Java',
                'b' => 'PHP',
                'c' => 'Python',
                'd' => 'C++',
                'answer' => 'PHP',
            ],
            [
                'question' => 'Apa fungsi utama CSS?',
                'a' => 'Membuat logika website',
                'b' => 'Membuat database',
                'c' => 'Mengatur tampilan halaman web',
                'd' => 'Membuat server',
                'answer' => 'Mengatur tampilan halaman web',
            ],
            [
                'question' => 'Framework PHP yang dikembangkan oleh Laravel adalah?',
                'a' => 'CodeIgniter',
                'b' => 'Laravel',
                'c' => 'Symfony',
                'd' => 'Yii',
                'answer' => 'Laravel',
            ],
            [
                'question' => 'Apa kepanjangan dari SQL?',
                'a' => 'Structured Question Language',
                'b' => 'Simple Query Language',
                'c' => 'Structured Query Language',
                'd' => 'System Query Language',
                'answer' => 'Structured Query Language',
            ],
            [
                'question' => 'Tipe data apa yang digunakan untuk menyimpan bilangan bulat?',
                'a' => 'Float',
                'b' => 'String',
                'c' => 'Integer',
                'd' => 'Boolean',
                'answer' => 'Integer',
            ],
            [
                'question' => 'Apa fungsi dari method POST dalam HTTP?',
                'a' => 'Mengambil data dari server',
                'b' => 'Mengirim data ke server',
                'c' => 'Menghapus data di server',
                'd' => 'Memperbarui data di server',
                'answer' => 'Mengirim data ke server',
            ],
            [
                'question' => 'Bahasa pemrograman apa yang biasa digunakan untuk machine learning?',
                'a' => 'JavaScript',
                'b' => 'Ruby',
                'c' => 'Python',
                'd' => 'Swift',
                'answer' => 'Python',
            ],
            [
                'question' => 'Apa fungsi dari Git?',
                'a' => 'Membuat website',
                'b' => 'Manajemen versi kode',
                'c' => 'Desain grafis',
                'd' => 'Pengolah kata',
                'answer' => 'Manajemen versi kode',
            ],
            [
                'question' => 'Apa kepanjangan dari API?',
                'a' => 'Application Programming Interface',
                'b' => 'Advanced Programming Integration',
                'c' => 'Automated Program Interaction',
                'd' => 'Application Process Interface',
                'answer' => 'Application Programming Interface',
            ],
            [
                'question' => 'Framework JavaScript yang dikembangkan oleh Facebook?',
                'a' => 'Angular',
                'b' => 'Vue.js',
                'c' => 'React',
                'd' => 'Svelte',
                'answer' => 'React',
            ],
            [
                'question' => 'Apa fungsi dari keyword "static" dalam OOP?',
                'a' => 'Membuat variabel privat',
                'b' => 'Membuat method yang dapat diakses tanpa membuat objek',
                'c' => 'Membatasi akses method',
                'd' => 'Membuat variabel global',
                'answer' => 'Membuat method yang dapat diakses tanpa membuat objek',
            ],
            [
                'question' => 'Database NoSQL yang populer?',
                'a' => 'MySQL',
                'b' => 'PostgreSQL',
                'c' => 'MongoDB',
                'd' => 'Oracle',
                'answer' => 'MongoDB',
            ],
            [
                'question' => 'Apa fungsi dari "composer" di PHP?',
                'a' => 'Membuat desain',
                'b' => 'Manajemen dependensi',
                'c' => 'Membuat database',
                'd' => 'Mengatur server',
                'answer' => 'Manajemen dependensi',
            ],
            [
                'question' => 'Metode enkripsi yang aman untuk menyimpan password?',
                'a' => 'MD5',
                'b' => 'Base64',
                'c' => 'Hashing',
                'd' => 'Plaintext',
                'answer' => 'Hashing',
            ],
            [
                'question' => 'Apa itu RESTful API?',
                'a' => 'Protokol komunikasi antar aplikasi',
                'b' => 'Bahasa pemrograman',
                'c' => 'Tipe database',
                'd' => 'Framework web',
                'answer' => 'Protokol komunikasi antar aplikasi',
            ],
            [
                'question' => 'Bahasa pemrograman yang digunakan untuk pengembangan aplikasi mobile di Android?',
                'a' => 'Swift',
                'b' => 'Java',
                'c' => 'Kotlin',
                'd' => 'C#',
                'answer' => 'Java',
            ],
            [
                'question' => 'Apa itu Docker?',
                'a' => 'Sistem operasi',
                'b' => 'Platform untuk mengembangkan, mengirim, dan menjalankan aplikasi dalam kontainer',
                'c' => 'Bahasa pemrograman',
                'd' => 'Database',
                'answer' => 'Platform untuk mengembangkan, mengirim, dan menjalankan aplikasi dalam kontainer',
            ],
            [
                'question' => 'Apa yang dimaksud dengan "Big O Notation"?',
                'a' => 'Metode pengukuran kecepatan internet',
                'b' => 'Notasi untuk menggambarkan kompleksitas algoritma',
                'c' => 'Bahasa pemrograman',
                'd' => 'Framework pengembangan',
                'answer' => 'Notasi untuk menggambarkan kompleksitas algoritma',
            ],
            [
                'question' => 'Apa itu Cloud Computing?',
                'a' => 'Pengolahan data di server lokal',
                'b' => 'Pengolahan data di server jarak jauh melalui internet',
                'c' => 'Pengolahan data di perangkat mobile',
                'd' => 'Pengolahan data di komputer pribadi',
                'answer' => 'Pengolahan data di server jarak jauh melalui internet',
            ],
        ];

        $insertData = [];

        foreach ($questions as $index => $question) {
            $insertData[] = [
                'module_id' => $module->id,
                'question' => $question['question'],
                'a' => $question['a'],
                'b' => $question['b'],
                'c' => $question['c'],
                'd' => $question['d'],
                'answer' => $question['answer'],
                'created_at' => $now->addSeconds($index),
                'updated_at' => $now->copy()->addSeconds($index), // menggunakan copy untuk tidak memodifikasi $now
            ];
        }

    BankSoal::insert($insertData);
    }
}
