<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BerandaController extends Controller
{
    public function edit()
    {
        $beranda = Beranda::first() ?? Beranda::create([]);
        return view('admin.beranda.edit', compact('beranda'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul'         => ['nullable', 'string', 'max:255'],
            'subjudul'      => ['nullable', 'string', 'max:255'],
            'hero_slide_1'  => ['nullable', 'image', 'max:4096'],
            'hero_slide_2'  => ['nullable', 'image', 'max:4096'],
        ]);

        $beranda = Beranda::first() ?? new Beranda();
        $beranda->judul    = $request->judul ?: $beranda->judul;
        $beranda->subjudul = $request->subjudul ?: $beranda->subjudul;

        $folder = public_path('images/hero');
        if (!File::isDirectory($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        if ($request->hasFile('hero_slide_1')) {
            $file = $request->file('hero_slide_1');
            $name = 'hero-1-'.time().'.'.$file->getClientOriginalExtension();
            $file->move($folder, $name);
            $beranda->hero_slide_1 = $name;
        }

        if ($request->hasFile('hero_slide_2')) {
            $file = $request->file('hero_slide_2');
            $name = 'hero-2-'.time().'.'.$file->getClientOriginalExtension();
            $file->move($folder, $name);
            $beranda->hero_slide_2 = $name;
        }

        $beranda->save();

        return redirect()->route('admin.beranda.edit')->with('status', 'Beranda berhasil diperbarui.');
    }
}