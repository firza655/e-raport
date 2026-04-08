<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class NilaiController extends Controller
{
    public function index()
    {
         $user = Auth::guard('siswa')->user(); 
        $siswa = \App\Models\Siswa::where('user_id', $user->id)->first();
        if (!$siswa) {
            abort(404, 'Data siswa tidak ditemukan untuk user ini.');
            }

        $nilais = \App\Models\Nilai::where('siswa_id', $siswa->id)->get();
        return view('siswa.nilai.index', compact('nilais'));
    }
}

