<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Hero::create([
            'title' => 'SI - RAJAPEDE',
            'subtitle' => 'Sistem Informasi Rekam Jejak Pengandang Disabilitas',
            'image' => 'frontend/assets/img/hero-carousel/hero-carousel-1.jpg',
            'is_active' => true,
        ]);

        \App\Models\Hero::create([
            'title' => 'SI - RAJAPEDE',
            'subtitle' => 'Sistem Informasi Rekam Jejak Pengandang Disabilitas',
            'image' => 'frontend/assets/img/hero-carousel/hero-carousel-2.jpg',
            'is_active' => true,
        ]);

        \App\Models\Hero::create([
            'title' => 'SI - RAJAPEDE',
            'subtitle' => 'Sistem Informasi Rekam Jejak Pengandang Disabilitas',
            'image' => 'frontend/assets/img/hero-carousel/hero-carousel-3.jpg',
            'is_active' => true,
        ]);

        \App\Models\Hero::create([
            'title' => 'SI - RAJAPEDE',
            'subtitle' => 'Sistem Informasi Rekam Jejak Pengandang Disabilitas',
            'image' => 'frontend/assets/img/hero-carousel/hero-carousel-4.jpg',
            'is_active' => true,
        ]);
    }
}
