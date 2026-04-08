<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;

class NilaiController extends Controller
{
    protected $table = 'mapels'; 

    /**
     * Menampilkan daftar nilai yang dikelompokkan berdasarkan siswa.
     */
    public function index()
{
    $nilai = Nilai::with(['siswa.kelas', 'mapel'])->get();

    // Group by kelas, lalu group by siswa dalam kelas tersebut
    $nilaiGrouped = $nilai->groupBy(function ($item) {
        return $item->siswa->kelas->nama ?? 'Tanpa Kelas';
    })->map(function ($group) {
        return $group->groupBy(function ($item) {
            return $item->siswa->nama;
        });
    });

    return view('guru.nilai.index', compact('nilaiGrouped'));
}


    /**
     * Tampilkan form untuk membuat nilai baru.
     */
    public function create()
    {
        $guru = Auth::guard('guru')->user();

        if (!$guru) {
            return redirect()->route('guru.dashboard')->with('error', 'Gagal mengambil data guru.');
        }

        $siswas = Siswa::all();
        $mapels = $guru->mapels; // ambil relasi many-to-many

        return view('guru.nilai.create', compact('siswas', 'mapels'));
    }

    /**
     * Simpan nilai baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mapel_id' => 'required|exists:mapels,id',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        Nilai::create([
            'guru_id' => Auth::guard('guru')->id(),
            'siswa_id' => $request->siswa_id,
            'mapel_id' => $request->mapel_id,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('guru.nilai.index')->with('success', 'Nilai berhasil ditambahkan.');
    }

    /**
     * Form edit nilai.
     */
    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        $mapels = Mapel::all();

        return view('guru.nilai.edit', compact('nilai', 'mapels'));
    }

    /**
     * Update nilai yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|numeric',
            'mapel_id' => 'required|exists:mapels,id'
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->update([
            'nilai' => $request->nilai,
            'mapel_id' => $request->mapel_id
        ]);

        return redirect()->route('guru.nilai.index')->with('success', 'Nilai berhasil diperbarui.');
    }
}
