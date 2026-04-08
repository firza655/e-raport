<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mapel;
use App\Models\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::with('gurus')->get(); // menampilkan semua mapel beserta guru
        return view('admin.mapel.index', compact('mapels'));
    }

    public function create()
    {
        $gurus = Guru::all();
        return view('admin.mapel.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:10|unique:mapels,kode',
            'nama' => 'required|string|max:255',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        $mapel = Mapel::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'guru_id' => $request->guru_id,
        ]);

        // Hubungkan ke guru
        $guru = Guru::find($request->guru_id);
        if ($guru) {
            $guru->mapels()->attach($mapel->id);
        }

        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil ditambahkan.');
    }

    public function edit(Mapel $mapel)
    {
        $gurus = Guru::all();
        return view('admin.mapel.edit', compact('mapel', 'gurus'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'kode' => 'required|string|max:10|unique:mapels,kode,' . $mapel->id,
            'nama' => 'required|string|max:255',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        $mapel->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        // Sinkronisasi relasi guru-mapel
        $guru = Guru::find($request->guru_id);
        if ($guru) {
            $mapel->gurus()->sync([$guru->id]);
        }

        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil diperbarui.');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->gurus()->detach(); // putuskan relasi many-to-many terlebih dahulu
        $mapel->delete();

        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil dihapus.');
    }
}
