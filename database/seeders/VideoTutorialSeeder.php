<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoTutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\VideoTutorial::create([
            'judul' => 'Pengenalan Bahasa Isyarat Indonesia (BISINDO)',
            'keterangan' => 'Video tutorial dasar tentang Bahasa Isyarat Indonesia untuk pemula.',
            'link_youtube' => 'https://www.youtube.com/watch?v=5qap5aO4i9A',
        ]);

        \App\Models\VideoTutorial::create([
            'judul' => 'Belajar Alfabet Bahasa Isyarat',
            'keterangan' => 'Pelajari huruf-huruf dalam bahasa isyarat dari A sampai Z.',
            'link_youtube' => 'https://www.youtube.com/watch?v=0zM3nApSvMg',
        ]);

        \App\Models\VideoTutorial::create([
            'judul' => 'Kosa Kata Dasar Bahasa Isyarat',
            'keterangan' => 'Kumpulan kata-kata dasar yang sering digunakan dalam komunikasi sehari-hari.',
            'link_youtube' => 'https://www.youtube.com/watch?v=5qap5aO4i9A',
        ]);

        \App\Models\VideoTutorial::create([
            'judul' => 'Bahasa Isyarat untuk Anak-Anak',
            'keterangan' => 'Tutorial bahasa isyarat yang dirancang khusus untuk anak-anak.',
            'link_youtube' => 'https://www.youtube.com/watch?v=0zM3nApSvMg',
        ]);

        \App\Models\VideoTutorial::create([
            'judul' => 'Komunikasi dengan Penyandang Disabilitas Tuli',
            'keterangan' => 'Cara berkomunikasi efektif dengan orang tuli menggunakan bahasa isyarat.',
            'link_youtube' => 'https://www.youtube.com/watch?v=5qap5aO4i9A',
        ]);
    }
}
