<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::with('mapels')->get();
        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        $mapels = Mapel::all();
        return view('admin.guru.create', compact('mapels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:gurus,email',
            'nip'      => 'required|string|max:20|unique:gurus,nip',
            'alamat'   => 'required|string|max:255',
            'mapels'   => 'required|array',
            'mapels.*' => 'exists:mapels,id',
            'password' => 'required|string|min:6',
        ], [
            'email.unique' => 'Email sudah terdaftar.',
            'nip.unique'   => 'NIP sudah ada.',
        ]);

        $guru = Guru::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'nip'      => $request->nip,
            'alamat'   => $request->alamat,
            'password' => bcrypt($request->password),
        ]);

        // Simpan relasi ke tabel pivot
        $guru->mapels()->sync($request->mapels);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $guru = Guru::with('mapels')->findOrFail($id);
        $mapels = Mapel::all();

        return view('admin.guru.edit', compact('guru', 'mapels'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:gurus,email,' . $guru->id,
            'nip'      => 'required|string|max:20|unique:gurus,nip,' . $guru->id,
            'alamat'   => 'required|string|max:255',
            'mapels'   => 'required|array',
            'mapels.*' => 'exists:mapels,id',
            'password' => 'nullable|string|min:6',
        ], [
            'email.unique' => 'Email sudah terdaftar.',
            'nip.unique'   => 'NIP sudah ada.',
        ]);

        $data = [
            'nama'   => $request->nama,
            'email'  => $request->email,
            'nip'    => $request->nip,
            'alamat' => $request->alamat,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $guru->update($data);

        // Update relasi many-to-many
        $guru->mapels()->sync($request->mapels);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        // Hapus relasi mapel terlebih dahulu
        $guru->mapels()->detach();

        // Hapus guru
        $guru->delete();

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}
