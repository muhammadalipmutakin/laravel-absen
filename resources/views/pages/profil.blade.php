@extends('layouts.dashboard')
<title>{{ $title }}</title>

@section('content')
<div class="container bg-secondary text-white">
              <h2 class="text-center mb-4">Profil Karyawan</h2>
              <div class="row">
                <div class="col-lg-6 my-4">
                  <img src="{{ url('storage/' .$user->foto) }}" alt="{{ $user->nama }}" width="350">
                </div>
                <div class="col-lg-6">
                  
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <p class="form-control-static ml-4" id="nama">{{ $user->nama }}</p>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <p class="form-control-static ml-4"  id="email">{{ $user->email }}</p>
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <p class="form-control-static ml-4" id="alamat">{{ $user->alamat }}</p>
                  </div>
                  <div class="mb-3">
                    <label for="tglBergabung" class="form-label"
                      >Tanggal Bergabung:</label
                    >
                    <p class="form-control-static ml-4" id="tglBergabung">
                      {{ $user->created_at }}
                    </p>
                  </div>
                  <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan:</label>
                    <p class="form-control-static ml-4" id="jabatan">{{ $user->jabatan }}</p>
                  </div>
                  <!-- Tambahkan atribut lain yang diperlukan -->
                </div>
              </div>
            </div>
@endsection

        