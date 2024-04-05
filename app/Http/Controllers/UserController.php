<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.data-karyawan', [
            'title' => 'Data Karyawan',
            'users' => User::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tambah-karyawan', [
            'title' => 'Tambah Data Karyawan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('img.users', 'public');
        User::create($data);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.edit-karyawan', [
            'title' => 'Edit Data Karyawan',
            'item' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        // Periksa apakah ada file yang dikirimkan dalam request
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            $oldFoto = User::find($id)->foto;
            if ($oldFoto) {
                Storage::disk('public')->delete($oldFoto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('img.users', 'public');
        } else {
            // Hapus key 'foto' jika tidak ada file yang dikirimkan
            unset($data['foto']);
        }

        // Update data pengguna
        User::find($id)->update($data);

        return redirect()->route('users.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
}
