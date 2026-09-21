<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\JurusanKegiatan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $tkr = Jurusan::factory()->tkr()->create();
        JurusanKegiatan::factory()->create([
            'jurusan_id' => $tkr->id,
            'foto'       => 'images/jurusan/kegiatan/tkr-1.jpg',
            'caption'    => 'Ruang Praktik Siswa (RPS) TKR',
        ]);

        $pms = Jurusan::factory()->pms()->create();
        JurusanKegiatan::factory()->create([
            'jurusan_id' => $pms->id,
            'foto'       => 'images/jurusan/kegiatan/pms-1.jpg',
            'caption'    => 'Workshop Bisnis Daring dan Pemasaran (BDP)',
        ]);

        $pplg = Jurusan::factory()->pplg()->create();
        JurusanKegiatan::factory()->create([
            'jurusan_id' => $pplg->id,
            'foto'       => 'images/jurusan/kegiatan/pplg-1.jpg',
            'caption'    => 'Workshop Rekayasa Perangkat Lunak (RPL)',
        ]);
        JurusanKegiatan::factory()->create([
            'jurusan_id' => $pplg->id,
            'foto'       => 'images/jurusan/kegiatan/pplg-2.jpg',
            'caption'    => 'Ruang administrasi PPLG',
        ]);

        // APHP sengaja tanpa foto kegiatan, sesuai data aslinya
        Jurusan::factory()->aphp()->create();
    }
}