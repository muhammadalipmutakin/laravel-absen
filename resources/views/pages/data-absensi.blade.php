@extends('layouts.dashboard')
<title>{{ $title }}</title>

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Absensi Karyawan</h1>
<p>Halaman ini menampilkan daftar absensi karyawan</p>
<p>Silahkan lakukan pengecekan dan konfimasi jika sudah sesuai</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive table-striped">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @if(count($data) > 0)
            @foreach ($data as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->user->nama }}</td>
                <td>{{ $item->time_masuk }}</td>
                <td>{{ $item->time_pulang }}</td>
                <td>{{ $item->status }}</td>
                <td>
                  <button class="detail-button btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal">
                    Detail
                    <i class="fas fa-info-circle"></i>
                  </button>
                  <button class="detail-button btn btn-warning" onclick="confirmAction({{ $item->id }})">
                    Konfirmasi
                    <i class="fas fa-check"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="6">Tidak ada data</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>



<!-- Modal Detail Data Karyawan -->
@if($data->isNotEmpty())
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="detailModalLabel">Detail Data Karyawan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="container-fluid border p-5">
                  <h6 class="text-center mb-5">Detail Masuk</h6>
                  <hr>
                  <p>Waktu Masuk: {{ $item->time_masuk }}</p>
                  <p>Foto Masuk: <a href="#" data-bs-toggle="modal" data-bs-target="#imageModalMasuk"><img src="{{ url('storage/' .$item->foto_masuk) }}" alt="{{ $item->nama }}" class="rounded object-fit-cover" width="80"></a></p>
                  <p>Kegiatan: {{ $item->kegiatan }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="container-fluid border p-5">
                  <h6 class="text-center mb-5">Detail Pulang</h6>
                  <hr>
                  <p>Waktu Pulang: {{ $item->time_pulang }}</p>
                  <p>Foto Pulang: <a href="#" data-bs-toggle="modal" data-bs-target="#imageModalPulang"><img src="{{ url('storage/' .$item->foto_pulang) }}" alt="{{ $item->nama }}" class="rounded object-fit-cover" width="80"></a></p>
                  <p>Keterangan: {{ $item->keterangan }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Konfirmasi</button>
          </div>
        </div>
      </div>
    </div>
@endif


@if($data->isNotEmpty())
<div class="modal fade" id="imageModalMasuk" tabindex="-1" aria-labelledby="imageModalMasukLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <img src="{{ url('storage/' .$item->foto_masuk) }}" class="img-fluid" alt="{{ $item->nama }}">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="imageModalPulang" tabindex="-1" aria-labelledby="imageModalPulangLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <img src="{{ url('storage/' .$item->foto_pulang) }}" class="img-fluid" alt="{{ $item->nama }}">
      </div>
    </div>
  </div>
</div>
@endif





    <!-- Page level plugins -->
    <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('js/demo/datatables-demo.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      function confirmAction(id) {
          if (confirm("Apakah Anda yakin ingin melakukan konfirmasi?")) {
              // Membuat sebuah form untuk mengirim permintaan DELETE
              var form = document.createElement('form');
              form.setAttribute('method', 'POST');
              form.setAttribute('action', '/absensi/' + id);
              form.setAttribute('style', 'display: none;');
  
              // Tambahkan input untuk spoofing method DELETE
              var token = document.createElement('input');
              token.setAttribute('type', 'hidden');
              token.setAttribute('name', '_token');
              token.setAttribute('value', '{{ csrf_token() }}');
              form.appendChild(token);
  
              // Tambahkan input untuk spoofing method DELETE
              var method = document.createElement('input');
              method.setAttribute('type', 'hidden');
              method.setAttribute('name', '_method');
              method.setAttribute('value', 'DELETE');
              form.appendChild(method);
  
              // Tambahkan form ke dalam dokumen
              document.body.appendChild(form);
  
              // Submit form
              form.submit();
          }
      }
  </script>
  
  
@endsection