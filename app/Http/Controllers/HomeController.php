<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->jabatan == 'admin') {
            $totalUsers = User::count();
            $totalUnconfirmedAbsensi = Absensi::where('status', 'belum-terkonfirmasi')->count();
            $totalConfirmedAbsensi = Absensi::where('status', 'terkonfirmasi')->count();

            $data = [
                'title' => 'Dashboard',
                'users' => User::orderBy('id', 'DESC')->get(),
                'totalUsers' => $totalUsers,
                'totalUnconfirmedAbsensi' => $totalUnconfirmedAbsensi,
                'totalConfirmedAbsensi' => $totalConfirmedAbsensi,
            ];

            return view('pages.dashboard', $data);
        } else {
            $user = Auth::user();
            return view('pages.profil', [
                'title' => 'Profil',
                'user' => $user
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        // Redirect to home page or any desired page after logout
        return redirect('/');
    }
}
