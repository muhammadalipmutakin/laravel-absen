@extends('layouts.dashboard')
<title>{{ $title }}</title>

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Halaman Absen Masuk</h1>
<p>Silakhan Lakukan Absensi Masuk</p>
<p>
  Perhatikan jam masuk dan pastikan bahwa anda mengisi data dengan
  benar, dikarenakan data yang sudah disubmit tidak dapat diedit
</p>

<div class="container">
    <form action="{{ route('absensi.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf    
    <div class="mb-3">
      <label for="nama" class="form-label">Nama:</label>
      <input
        type="text"
        value="{{ $data->nama }}"
        class="form-control"
        id="nama"
        name="nama"
        readonly
      />
    </div>
    <div class="mb-3">
      <label for="foto" class="form-label">Upload Foto:</label>
      <input
        type="file"
        class="form-control"
        id="foto"
        name="foto_masuk"
        accept="image/*"
        required
      />
    </div>
    <div class="mb-3">
      <label for="kegiatan" class="form-label">Kegiatan:</label>
      <textarea
        class="form-control"
        id="kegiatan"
        name="kegiatan"
        rows="4"
        required
      ></textarea>
    </div>
    <button type="submit" class="btn btn-primary">
      Absen Masuk
    </button>
  </form>
</div>
@endsection

        