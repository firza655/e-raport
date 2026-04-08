<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

class DashboardSiswaController extends Controller
{
    public function index()
{
    $siswa = Siswa::where('user_id', Auth::id())->first(); // ✅ BENAR
    return view('siswa.dashboard', compact('siswa'));                  // ambil relasi ke data siswa
}

}

