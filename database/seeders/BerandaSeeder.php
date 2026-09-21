<?php

namespace Database\Seeders;

use App\Models\Beranda;
use Illuminate\Database\Seeder;

class BerandaSeeder extends Seeder
{
    public function run(): void
    {
        Beranda::updateOrCreate(
            ['id' => 1],
            Beranda::factory()->make()->toArray()
        );
    }
}