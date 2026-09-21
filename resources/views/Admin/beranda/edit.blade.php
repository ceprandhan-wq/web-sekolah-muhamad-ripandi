<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin — Kelola Beranda</title>
<style>
  body{font-family:Arial,sans-serif;background:#f4f5f8;padding:32px;}
  .panel{max-width:560px;margin:0 auto;background:#fff;border-radius:12px;padding:24px;box-shadow:0 4px 14px rgba(0,0,0,.08);}
  .field{margin-bottom:16px;}
  label{display:block;font-weight:600;margin-bottom:6px;font-size:13px;}
  input[type=text],input[type=file]{width:100%;padding:8px;border:1px solid #ddd;border-radius:6px;}
  .btn{background:#0e7c7b;color:#fff;border:none;padding:10px 18px;border-radius:6px;cursor:pointer;}
  .status{background:#e6f7f1;color:#0e7c6c;padding:10px;border-radius:6px;margin-bottom:16px;}
  .preview{max-width:160px;display:block;margin-top:8px;border-radius:6px;}
</style>
</head>
<body>
  <div class="panel">
    <h2>Kelola Beranda</h2>

    @if(session('status'))
      <div class="status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.beranda.update') }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="field">
        <label>Judul</label>
        <input type="text" name="judul" value="{{ old('judul', $beranda->judul) }}">
      </div>

      <div class="field">
        <label>Subjudul</label>
        <input type="text" name="subjudul" value="{{ old('subjudul', $beranda->subjudul) }}">
      </div>

      <div class="field">
        <label>Foto Hero 1</label>
        <input type="file" name="hero_slide_1" accept="image/*">
        @if($beranda->hero_slide_1)
          <img class="preview" src="{{ asset('images/hero/'.$beranda->hero_slide_1) }}">
        @endif
      </div>

      <div class="field">
        <label>Foto Hero 2</label>
        <input type="file" name="hero_slide_2" accept="image/*">
        @if($beranda->hero_slide_2)
          <img class="preview" src="{{ asset('images/hero/'.$beranda->hero_slide_2) }}">
        @endif
      </div>

      <button type="submit" class="btn">Simpan</button>
    </form>
  </div>
</body>
</html>