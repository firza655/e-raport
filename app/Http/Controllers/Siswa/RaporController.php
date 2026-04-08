<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class RaporController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::guard('siswa')->user();

        // Ambil data siswa berdasarkan user_id
        $siswa = Siswa::with('kelas')->where('user_id', $user->id)->first();

        if (!$siswa) {
            abort(404, 'Data siswa tidak ditemukan.');
        }

        // Ambil semua nilai berdasarkan siswa_id
        $nilais = Nilai::with('mapel')
            ->where('siswa_id', $siswa->id)
            ->get();

        $rataRata = $nilais->avg('nilai') ?? 0;
        $status = $rataRata >= 75 ? 'Naik Kelas' : 'Tinggal Kelas';

        return view('siswa.rapor.index', [
            'user' => $siswa, // Sekarang $user adalah model Siswa
            'nilais' => $nilais,
            'rataRata' => $rataRata,
            'status' => $status,
        ]);
    }

    public function cetak()
    {
        $user = Auth::guard('siswa')->user();

        // Ambil data siswa
        $siswa = Siswa::with('kelas')->where('user_id', $user->id)->first();

        if (!$siswa) {
            abort(404, 'Data siswa tidak ditemukan.');
        }

        $nilais = Nilai::with('mapel')
            ->where('siswa_id', $siswa->id)
            ->get();

        $pdf = PDF::loadView('siswa.rapor.cetak', [
            'siswa' => $siswa,
            'nilais' => $nilais
        ]);

        return $pdf->download('rapor_' . $siswa->nama . '.pdf');
    }
}
