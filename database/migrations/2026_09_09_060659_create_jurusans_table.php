<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('kode');            // TKR, PMS, PPLG, APHP
            $table->string('nama');
            $table->string('logo')->nullable();
            $table->string('warna')->default('#1c4e80');
            $table->text('deskripsi')->nullable();
            $table->string('kepala_nama')->nullable();
            $table->string('kepala_jabatan')->nullable();
            $table->string('kepala_foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};