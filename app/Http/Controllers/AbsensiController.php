<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Absensi::with('user')
            ->where('status', 'belum-terkonfirmasi')
            ->get();

        return view('pages.data-absensi', [
            'title' => 'Daftar Absensi Karyawan',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Auth::user();
        return view('pages.masuk', [
            'title' => 'Absen Masuk',
            'data' => $data

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['time_masuk'] = now(); // Mengambil waktu sekarang
        $data['foto_masuk'] = $request->file('foto_masuk')->store('img.absen_masuk', 'public');

        Absensi::create($data);

        return redirect()->route('absensi.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();

        // Temukan record Absensi yang sesuai dengan user yang sedang login dan time_pulang masih kosong
        $absensi = Absensi::where('user_id', $user->id)
            ->whereNull('time_pulang')
            ->first();

        // Jika record Absensi ditemukan
        if ($absensi) {
            // Mengembalikan view dengan data yang ditemukan
            return view('pages.pulang', [
                'title' => 'Absen Pulang',
                'data' => $user,
                'item' => $absensi
            ]);
        } else {
            // Jika record Absensi tidak ditemukan, kirimkan pesan bahwa user belum melakukan absensi masuk
            $pesan = 'Anda belum melakukan absensi masuk.';
            return view('pages.pulang', [
                'title' => 'Absen Pulang',
                'data' => $user,
                'pesan' => $pesan
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['time_pulang'] = now(); // Mengambil waktu sekarang
        $data['foto_pulang'] = $request->file('foto_pulang')->store('img.absen_pulang', 'public');


        // Menemukan record Absensi berdasarkan ID atau menghasilkan pengecualian jika tidak ditemukan
        $absensi = Absensi::findOrFail($id);

        // Melakukan pembaruan data pada record yang ditemukan
        $absensi->update($data);

        return redirect()->route('absensi.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $absensi = Absensi::findOrFail($id);
        $data['status'] = 'terkonfirmasi'; // Tambahkan tanda titik-koma di akhir baris

        // Melakukan pembaruan data pada record yang ditemukan
        $absensi->update($data);

        return redirect()->route('absensi.index');
    }
}
