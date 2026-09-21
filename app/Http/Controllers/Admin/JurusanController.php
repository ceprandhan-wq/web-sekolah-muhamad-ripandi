<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\JurusanKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::orderBy('kode')->get();
        return view('admin.jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('admin.jurusan.edit', ['jurusan' => new Jurusan()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $jurusan = Jurusan::create($data);
        $this->handleUploads($request, $jurusan);

        return redirect()->route('admin.jurusan.index')->with('status', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $data = $this->validated($request);
        $jurusan->update($data);
        $this->handleUploads($request, $jurusan);

        return redirect()->route('admin.jurusan.index')->with('status', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return back()->with('status', 'Jurusan berhasil dihapus.');
    }

    public function storeKegiatan(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'foto'    => ['required', 'image', 'max:4096'],
            'caption' => ['nullable', 'string', 'max:255'],
        ]);

        $folder = public_path('images/jurusan/kegiatan');
        if (!File::isDirectory($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $file = $request->file('foto');
        $name = $jurusan->kode.'-'.time().'.'.$file->getClientOriginalExtension();
        $file->move($folder, $name);

        JurusanKegiatan::create([
            'jurusan_id' => $jurusan->id,
            'foto'       => 'images/jurusan/kegiatan/'.$name,
            'caption'    => $request->caption,
        ]);

        return back()->with('status', 'Foto kegiatan ditambahkan.');
    }

    public function destroyKegiatan(JurusanKegiatan $kegiatan)
    {
        $jurusanId = $kegiatan->jurusan_id;
        $kegiatan->delete();
        return redirect()->route('admin.jurusan.edit', $jurusanId)->with('status', 'Foto kegiatan dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'kode'            => ['required', 'string', 'max:20'],
            'nama'            => ['required', 'string', 'max:255'],
            'warna'           => ['nullable', 'string', 'max:20'],
            'deskripsi'       => ['nullable', 'string'],
            'kepala_nama'     => ['nullable', 'string', 'max:255'],
            'kepala_jabatan'  => ['nullable', 'string', 'max:255'],
        ]);
    }

    private function handleUploads(Request $request, Jurusan $jurusan): void
    {
        $folder = public_path('images/jurusan');
        if (!File::isDirectory($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = 'logo-'.strtolower($jurusan->kode).'.'.$file->getClientOriginalExtension();
            $file->move($folder, $name);
            $jurusan->update(['logo' => 'images/jurusan/'.$name]);
        }

        if ($request->hasFile('kepala_foto')) {
            $kepalaFolder = public_path('images/jurusan/kepala');
            if (!File::isDirectory($kepalaFolder)) {
                File::makeDirectory($kepalaFolder, 0755, true);
            }
            $file = $request->file('kepala_foto');
            $name = 'kepala-'.strtolower($jurusan->kode).'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move($kepalaFolder, $name);
            $jurusan->update(['kepala_foto' => 'images/jurusan/kepala/'.$name]);
        }
    }
}