@extends('layouts.dashboard')
<title>{{ $title }}</title>

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Selamat Datang Admin</h1>
  <p class="mb-4">Berikut adalah ringkasan data karyawan dan absensi:</p>

  <div class="row">

    <!-- Daftar Karyawan Card -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Daftar Karyawan
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ number_format($totalUsers) }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Daftar Absensi Belum Terkonfirmasi Card -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Daftar Absensi Belum Terkonfirmasi
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ number_format($totalUnconfirmedAbsensi) }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Daftar Absensi Terkonfirmasi Card -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Daftar Absensi Terkonfirmasi
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ number_format($totalConfirmedAbsensi) }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-check fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection
