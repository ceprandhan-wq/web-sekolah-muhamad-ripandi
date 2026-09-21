<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BerandaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'hero_slide_1' => 'hero-upacara.jpg',
            'hero_slide_2' => 'tkr.jpg',
            'judul'        => 'Selamat Datang di SMK Negeri 1 Cijati',
            'subjudul'     => 'Sekolah Menengah Kejuruan Negeri',
        ];
    }
}