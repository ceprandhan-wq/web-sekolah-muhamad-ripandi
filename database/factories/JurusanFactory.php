<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JurusanFactory extends Factory
{
    public function definition(): array
    {
        $pilihan = [
            [
                'kode'           => 'TKR',
                'nama'           => 'Teknik Kendaraan Ringan',
                'logo'           => 'images/jurusan/logo-tkr.jpeg',
                'warna'          => '#1c4e80',
                'deskripsi'      => 'Program keahlian yang membekali siswa dengan kompetensi perawatan dan perbaikan kendaraan ringan, mulai dari sistem mesin, kelistrikan, hingga sasis dan pemindah tenaga.',
                'kepala_nama'    => 'Romi Darmayadi, S.Pd., S.T.',
                'kepala_jabatan' => 'Kepala Kompetensi Keahlian TKR',
                'kepala_foto'    => 'images/jurusan/kepala/kepala-tkr.jpg',
            ],
            [
                'kode'           => 'PMS',
                'nama'           => 'Pemasaran',
                'logo'           => 'images/jurusan/logo-pemasaran.jpeg',
                'warna'          => '#1565c0',
                'deskripsi'      => 'Program keahlian yang mempersiapkan siswa untuk terjun ke dunia bisnis dan pemasaran, meliputi bisnis digital, strategi promosi, hingga pengelolaan bisnis ritel.',
                'kepala_nama'    => 'Nanang Suryana',
                'kepala_jabatan' => 'Kepala Kompetensi Keahlian Pemasaran',
                'kepala_foto'    => 'images/jurusan/kepala/kepala-pms.JPG',
            ],
            [
                'kode'           => 'PPLG',
                'nama'           => 'Pengembangan Perangkat Lunak dan Gim',
                'logo'           => 'images/jurusan/logo-pplg.jpeg',
                'warna'          => '#d32f2f',
                'deskripsi'      => 'Program keahlian yang mengasah kemampuan siswa dalam pemrograman, pengembangan aplikasi/gim, serta desain antarmuka (UI/UX) untuk bekal karier di industri digital.',
                'kepala_nama'    => 'Rahmat Setiawan, S.T.',
                'kepala_jabatan' => 'Kepala Kompetensi Keahlian PPLG',
                'kepala_foto'    => 'images/jurusan/kepala/kepala-pplg.jpg',
            ],
            [
                'kode'           => 'APHP',
                'nama'           => 'Agriteknologi Pengolahan Hasil Pertanian',
                'logo'           => 'images/jurusan/logo-aphp.jpeg',
                'warna'          => '#c98a1f',
                'deskripsi'      => 'Program keahlian yang membekali siswa dalam mengolah hasil pertanian menjadi produk pangan bernilai jual, mulai dari proses produksi hingga pengemasan.',
                'kepala_nama'    => 'Budiana Hermawan, S.TP.',
                'kepala_jabatan' => 'Kepala Kompetensi Keahlian APHP',
                'kepala_foto'    => 'images/jurusan/kepala/kepala-aphp.jpg',
            ],
        ];

        return $this->faker->randomElement($pilihan);
    }

    /** State khusus supaya bisa dipanggil eksplisit per kode dari seeder. */
    public function tkr(): static
    {
        return $this->state(fn () => [
            'kode'           => 'TKR',
            'nama'           => 'Teknik Kendaraan Ringan',
            'logo'           => 'images/jurusan/logo-tkr.jpeg',
            'warna'          => '#1c4e80',
            'deskripsi'      => 'Program keahlian yang membekali siswa dengan kompetensi perawatan dan perbaikan kendaraan ringan, mulai dari sistem mesin, kelistrikan, hingga sasis dan pemindah tenaga.',
            'kepala_nama'    => 'Romi Darmayadi, S.Pd., S.T.',
            'kepala_jabatan' => 'Kepala Kompetensi Keahlian TKR',
            'kepala_foto'    => 'images/jurusan/kepala/kepala-tkr.jpg',
        ]);
    }

    public function pms(): static
    {
        return $this->state(fn () => [
            'kode'           => 'PMS',
            'nama'           => 'Pemasaran',
            'logo'           => 'images/jurusan/logo-pemasaran.jpeg',
            'warna'          => '#1565c0',
            'deskripsi'      => 'Program keahlian yang mempersiapkan siswa untuk terjun ke dunia bisnis dan pemasaran, meliputi bisnis digital, strategi promosi, hingga pengelolaan bisnis ritel.',
            'kepala_nama'    => 'Nanang Suryana',
            'kepala_jabatan' => 'Kepala Kompetensi Keahlian Pemasaran',
            'kepala_foto'    => 'images/jurusan/kepala/kepala-pms.JPG',
        ]);
    }

    public function pplg(): static
    {
        return $this->state(fn () => [
            'kode'           => 'PPLG',
            'nama'           => 'Pengembangan Perangkat Lunak dan Gim',
            'logo'           => 'images/jurusan/logo-pplg.jpeg',
            'warna'          => '#d32f2f',
            'deskripsi'      => 'Program keahlian yang mengasah kemampuan siswa dalam pemrograman, pengembangan aplikasi/gim, serta desain antarmuka (UI/UX) untuk bekal karier di industri digital.',
            'kepala_nama'    => 'Rahmat Setiawan, S.T.',
            'kepala_jabatan' => 'Kepala Kompetensi Keahlian PPLG',
            'kepala_foto'    => 'images/jurusan/kepala/kepala-pplg.jpg',
        ]);
    }

    public function aphp(): static
    {
        return $this->state(fn () => [
            'kode'           => 'APHP',
            'nama'           => 'Agriteknologi Pengolahan Hasil Pertanian',
            'logo'           => 'images/jurusan/logo-aphp.jpeg',
            'warna'          => '#c98a1f',
            'deskripsi'      => 'Program keahlian yang membekali siswa dalam mengolah hasil pertanian menjadi produk pangan bernilai jual, mulai dari proses produksi hingga pengemasan.',
            'kepala_nama'    => 'Budiana Hermawan, S.TP.',
            'kepala_jabatan' => 'Kepala Kompetensi Keahlian APHP',
            'kepala_foto'    => 'images/jurusan/kepala/kepala-aphp.jpg',
        ]);
    }
}