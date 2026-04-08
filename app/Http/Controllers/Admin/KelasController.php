<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::all();
        return view('admin.kelas.index', compact('kelass'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tingkat' => 'required|integer|min:1|max:12',
            'huruf' => 'required|string|max:5',
        ]);

        $tingkat = $request->tingkat;
        $huruf = strtoupper($request->huruf); // otomatis kapital
        $nama = $tingkat . ' ' . $huruf;

        Kelas::create([
            'tingkat' => $tingkat,
            'huruf' => $huruf,
            'nama' => $nama, // ← penting untuk hindari error NOT NULL
        ]);

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        return view('admin.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'tingkat' => 'required|integer|min:1|max:12',
            'huruf' => 'required|string|max:5',
        ]);

        $tingkat = $request->tingkat;
        $huruf = strtoupper($request->huruf);
        $nama = $tingkat . ' ' . $huruf;

        $kelas->update([
            'tingkat' => $tingkat,
            'huruf' => $huruf,
            'nama' => $nama, // ← pastikan di-update juga
        ]);

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
