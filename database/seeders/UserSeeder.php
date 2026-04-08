<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Kelas default dulu
        $kelas = Kelas::create([
            'nama' => 'XII RPL 1'
        ]);

        // Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Guru
        $guruUser = User::create([
            'name' => 'Guru',
            'email' => 'guru@mail.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
        ]);

        Guru::create([
            'nama' => 'Bapak Guru',
            'nip' => '1987654321',
            'alamat' => 'Jl. Pendidikan No.1',
            'user_id' => $guruUser->id,
        ]);

        // Siswa
        $siswaUser = User::create([
            'name' => 'Siswa',
            'email' => 'siswa@mail.com',
            'password' => Hash::make('siswa123'),
            'role' => 'siswa',
        ]);

        Siswa::create([
            'nama' => 'Ani',
            'nis' => '123456789',
            'alamat' => 'Jl. Pelajar No.2',
            'kelas_id' => $kelas->id,
            'user_id' => $siswaUser->id,
        ]);
    }
}
