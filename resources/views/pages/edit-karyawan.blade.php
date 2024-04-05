@extends('layouts.dashboard')
<title>{{ $title }}</title>

@section('content')
<h2>Tambah Data Karyawan</h2>
<form action="{{ route('users.update', $item->id) }}" method="post" enctype="multipart/form-data">
  @csrf @method('PUT')
  <div class="mb-3">
    <label for="nama" class="form-label">Nama:</label>
    <input type="text" name="nama" value="{{ $item->nama }}" class="form-control" id="nama" required />
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" name="email" value="{{ $item->email }}" class="form-control" id="email" required />
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat:</label>
    <input type="text" name="alamat" value="{{ $item->alamat }}" class="form-control" id="alamat" required />
  </div>
  <div class="mb-3">
    <label for="foto" class="form-label">Upload Foto:</label>
    <input
      type="file"
      class="form-control"
      id="foto"
      name="foto"
      accept="image/*"
      required
    />
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Password:</label>
    <input
      type="password"
      name="password"
      class="form-control"
      id="alamat"
      required
    />
  </div>
  <div class="mb-3">
    <label for="jabatan" class="form-label">Jabatan:</label>
    <input
      type="text"
      name="jabatan"
      value="{{ $item->jabatan }}"
      class="form-control"
      id="jabatan"
      value="karyawan"
      readonly
    />
  </div>
  <button class="btn btn-primary" type="submit">
    <i class="bx bx-save"></i> Simpan Perubahan
</button>
<a href="{{ route('users.index') }}" class="btn btn-light">
    <i class="bx bx-arrow-back"></i> Kembali
</a>
</form>
@endsection

        