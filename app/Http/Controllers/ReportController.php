<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $data = Absensi::with('user')
            ->where('status', 'terkonfirmasi')
            ->get();

        return view('pages.report', [
            'title' => 'Report Absensi Karyawan',
            'data' => $data
        ]);
    }

    public function filter(Request $request)
    {
        // Dapatkan tanggal awal dan akhir dari permintaan
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Filter catatan absensi berdasarkan tanggal yang diberikan
        $data = Absensi::with('user')
            ->where('status', 'terkonfirmasi')
            ->whereDate('time_masuk', '>=', $startDate)
            ->whereDate('time_masuk', '<=', $endDate)
            ->get();

        return view('pages.report', [
            'title' => 'Laporan Absensi Karyawan',
            'data' => $data
        ]);
    }
}
