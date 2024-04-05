@extends('layouts.dashboard')
<title>{{ $title }}</title>

@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Karyawan</h1>
    <p>halaman management Karyawan</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="{{ url('users/create') }}" class="btn btn-primary">Tambah karyawan</a>
      </div>
      <div class="card-body">
        @if ($users->count() > 0)
        <div class="table-responsive table-striped">
          <table
            class="table table-bordered"
            id="dataTable"
            width="100%"
            cellspacing="0"
          >
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Tgl Bergabung</th>
                <th>Jabatan</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($users as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                  <img src="{{ url('storage/' .$item->foto) }}" alt="{{ $item->nama }}"
                  class="rounded object-fit-cover" width="80">>
                  
                </td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>
                  <a href="{{ route('users.edit', $item->id) }}"
                    class="btn btn-warning btn-sm py-1 px-3 rounded-1 text-white">
                    <i class="bx bx-edit"></i> Edit
                </a>
                <form action="{{ route('users.destroy', $item->id) }}" method="post">
                    @csrf @method('DELETE')
                    <button class="btn btn-light btn-sm py-1 px-3 rounded-1" type="submit"
                        onclick="return confirm('Kamu yakin ingin menghapusnya?')">
                        <i class="bx bx-trash"></i> Hapus
                    </button>
                </td>
              </tr>
                  
              @endforeach
            </tbody>
          </table>
        </div>
        @else
          <p class="text-secondary text-center">No Data</p>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
    
@endsection

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
