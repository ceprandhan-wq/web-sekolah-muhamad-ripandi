<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berandas', function (Blueprint $table) {
            $table->id();
            $table->string('hero_slide_1')->nullable();
            $table->string('hero_slide_2')->nullable();
            $table->string('judul')->default('Selamat Datang di SMK Negeri 1 Cijati');
            $table->string('subjudul')->default('Sekolah Menengah Kejuruan Negeri');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berandas');
    }
};