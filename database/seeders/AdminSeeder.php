<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * ASUMSI: tabel `users` punya kolom `is_admin` (boolean).
     * Kalau ternyata kolomnya bernama beda (mis. `role`), sesuaikan
     * bagian array di updateOrCreate() di bawah.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sekolah.sch.id'],
            [
                'name'     => 'Administrator',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]
        );
    }
}