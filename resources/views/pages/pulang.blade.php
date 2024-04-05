@extends('layouts.dashboard')

@section('content')
    <!-- Heading Halaman -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Absen Pulang</h1>

    <div class="container d-flex flex-column justify-content-between" style="height: 60vh;">
        <div class="row">
            <div class="col-md-8 mx-auto">
                @if(isset($pesan))
                    <div class="alert alert-info">{{ $pesan }}</div>
                @else
                    @if($item)
                        <p>Silakan Lakukan Absensi Pulang</p>
                        <p>
                            Perhatikan waktu Pulang dan pastikan bahwa Anda mengisi data dengan
                            benar, karena data yang sudah disubmit tidak dapat diubah.
                        </p>

                        <form action="{{ route('absensi.update', $item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf @method('PATCH')
                            <input type="hidden" name="absensi_id" value="{{ $item->id }}">
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
                                    name="foto_pulang"
                                    accept="image/*"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="kegiatan" class="form-label">Keterangan:</label>
                                <textarea
                                    class="form-control"
                                    id="keterangan"
                                    name="keterangan"
                                    rows="4"
                                    required
                                ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Absen Pulang
                            </button>
                        </form>
                    @else
                        <div class="alert alert-warning">User belum melakukan absen masuk.</div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
