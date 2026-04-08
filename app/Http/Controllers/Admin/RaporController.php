<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class RaporController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('kelas')->get();
        return view('admin.rapor.index', compact('siswas'));
    }

    public function show($id)
    {
        $siswa = Siswa::with(['nilai.mapel', 'kelas'])->findOrFail($id);
        return view('admin.rapor.show', compact('siswa'));
    }
}
