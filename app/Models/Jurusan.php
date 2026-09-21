<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode', 'nama', 'logo', 'warna', 'deskripsi',
        'kepala_nama', 'kepala_jabatan', 'kepala_foto',
    ];

    public function kegiatan()
    {
        return $this->hasMany(JurusanKegiatan::class);
    }

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }
}