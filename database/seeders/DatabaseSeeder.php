<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'alamat' => 'Tangerang',
            'jabatan' => 'admin'
        ]);

        User::create([
            'nama' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'password' => Hash::make('karyawan123'),
            'alamat' => 'Tangerang',
            'jabatan' => 'karyawan'
        ]);
    }
}
