<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BerandaController;
use App\Http\Controllers\Admin\JurusanController;
use App\Models\Beranda;
use App\Models\Jurusan;

// ==========================
// Halaman Publik
// ==========================
Route::get('/', function () {
    $beranda = Beranda::first();
    return view('beranda', compact('beranda'));
});

Route::get('jurusan', function () {
    $daftarJurusanDetail = Jurusan::with('kegiatans')->orderBy('kode')->get();
    return view('jurusan', compact('daftarJurusanDetail'));
});

// (route login-link, dsb tetap seperti sebelumnya) ...

// ==========================
// Admin — setiap halaman punya URL sendiri, tinggal ketik di address bar
// setelah login (auth + level:admin tetap wajib demi keamanan)
// ==========================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'level:admin'])->group(function () {

    // /admin/beranda -> langsung form edit beranda
    Route::get('/beranda', [BerandaController::class, 'edit'])->name('beranda.edit');
    Route::put('/beranda', [BerandaController::class, 'update'])->name('beranda.update');

    // /admin/jurusan -> langsung daftar jurusan
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('/jurusan/{jurusan}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::put('/jurusan/{jurusan}', [JurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('/jurusan/{jurusan}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

    Route::post('/jurusan/{jurusan}/kegiatan', [JurusanController::class, 'storeKegiatan'])->name('jurusan.kegiatan.store');
    Route::delete('/jurusan-kegiatan/{kegiatan}', [JurusanController::class, 'destroyKegiatan'])->name('jurusan.kegiatan.destroy');
});