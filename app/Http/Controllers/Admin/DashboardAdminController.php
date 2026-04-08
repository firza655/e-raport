<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalGuru  = Guru::count();
        $totalKelas = Kelas::count();

        return view('admin.dashboard', compact('totalSiswa', 'totalGuru', 'totalKelas'));
    }
}
