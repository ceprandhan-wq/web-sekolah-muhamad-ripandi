<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanKegiatan extends Model
{
    use HasFactory;

    protected $fillable = ['jurusan_id', 'foto', 'caption'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}