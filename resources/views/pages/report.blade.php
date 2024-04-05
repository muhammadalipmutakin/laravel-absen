@extends('layouts.dashboard')
<title>{{ $title }}</title>

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Report Absensi Karyawan</h1>
<p>halaman report absensi Karyawan</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <button class="btn btn-success" onclick="exportToExcel()">
      Export ke Excel
    </button>
    <form action="{{ url('/report/filter') }}" method="POST" class="d-flex">
      @csrf
      <div class="input-group">
        <input type="date" class="form-control" name="start_date" id="start_date" required>
        <span class="input-group-text">sampai</span>
        <input type="date" class="form-control" name="end_date" id="end_date" required>
        <button type="submit" class="btn btn-primary">Filter</button>
      </div>
    </form>
    
  </div>
  <div class="card-body">
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
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Masuk</th>
            <th>Foto Masuk</th>
            <th>Pulang</th>
            <th>Foto Pulang</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $index => $item)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $item->user->nama }}</td>
              <td>{{ $item->user->jabatan }}</td>
              <td>{{ $item->time_masuk }}</td>
              <td>
                <img src="{{ url('storage/' .$item->foto_masuk) }}" alt="{{ $item->user->nama }}" class="rounded object-fit-cover" width="30">
              </td>
              <td>{{ $item->time_pulang }}</td>
              <td>
                <img src="{{ url('storage/' .$item->foto_pulang) }}" alt="{{ $item->user->nama }}" class="rounded object-fit-cover" width="30">
              </td>
              <td>{{ $item->keterangan }}</td>
            </tr>
          @endforeach         
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>


 <!-- Page level plugins -->
 <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}" defer></script>
 <script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}" defer></script>

 <!-- Page level custom scripts -->
 <script src="{{ url('js/demo/datatables-demo.js') }}" defer></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
<script>
  function exportToExcel() {
    // Buat workbook baru
    let wb = XLSX.utils.book_new();
    // Buat worksheet baru
    let ws = XLSX.utils.aoa_to_sheet([
      ['No', 'Nama', 'Jabatan', 'Masuk', 'Foto Masuk', 'Pulang', 'Foto Pulang', 'Keterangan']
    ]);

    // Dapatkan tabel
    let table = document.getElementById("dataTable");
    let rows = table.querySelectorAll("tr");

    // Iterasi setiap baris tabel
    rows.forEach((row, rowIndex) => {
      let rowData = [];
      row.querySelectorAll("td").forEach((cell, cellIndex) => {
        // Tambahkan teks sel ke dalam rowData
        rowData.push(cell.textContent);
        // Jika indeks sel adalah untuk gambar, tambahkan gambar
        if (cellIndex === 4 || cellIndex === 6) { // Indeks 4 dan 6 adalah untuk kolom foto masuk dan foto pulang
          let img = cell.querySelector("img");
          if (img) {
            // Dapatkan URL gambar
            let imgUrl = img.getAttribute("src");
            // Tambahkan gambar sebagai hyperlink
            rowData.push({ 
              v: imgUrl, // Nilai adalah URL gambar
              t: "s", // tipe data adalah string (s)
              l: { Target: imgUrl }, // Link menuju gambar
            });
          } else {
            // Tambahkan nilai kosong jika gambar tidak tersedia
            rowData.push("");
          }
        }
      });
      // Tambahkan baris data ke dalam worksheet
      XLSX.utils.sheet_add_aoa(ws, [rowData], {origin: -1});
    });

    // Tambahkan worksheet ke dalam workbook
    XLSX.utils.book_append_sheet(wb, ws, "Data Karyawan");
    
    // Simpan workbook sebagai file Excel
    XLSX.writeFile(wb, "data_karyawan.xlsx");
  }
</script>

@endsection

        