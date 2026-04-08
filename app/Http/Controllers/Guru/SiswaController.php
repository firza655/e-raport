<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('guru.siswa.index', compact('siswas'));
    }

    public function create()
    {
         $kelas = Kelas::all();
    return view('guru.siswa.form', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas',
            'kelas' => 'required|string',
        ]);

        Siswa::create($request->all());

        return redirect()->route('guru.siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
    $kelas = Kelas::all();
    return view('guru.siswa.form', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas,nis,' . $siswa->id,
            'kelas' => 'required|string',
        ]);

        $siswa->update($request->all());

        return redirect()->route('guru.siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();
        return redirect()->route('guru.siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
