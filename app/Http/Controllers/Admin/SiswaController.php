<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('kelas','user')->get();
        return view('admin.siswa.index', compact('siswas'));

    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.siswa.create', compact('kelas'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'nis' => 'required|unique:siswas,nis',
        'kelas_id' => 'required',
        'email' => 'nullable|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    $user = null;
    if ($request->filled('email')) {
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'siswa',
        ]);
    }

    Siswa::create([
        'nama' => $request->nama,
        'nis' => $request->nis,
        'kelas_id' => $request->kelas_id,
        'user_id' => $user ? $user->id : null,
    ]);

    return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
}



    public function edit($id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);
        $userId = $siswa->user ? $siswa->user->id : null;

        $request->validate([
            'nama'      => 'required|string|max:255',
            'nis'       => 'required|unique:siswas,nis,' . $siswa->id,
            'kelas_id'  => 'required|exists:kelas,id',
            'email'     => 'required|email|unique:users,email,' . $userId,
        ]);

        // Update akun user siswa
        if (!$siswa->user) {
            $user = User::create([
                'name'     => $request->nama,
                'email'    => $request->email,
                'password' => bcrypt('default123'),
                'role'     => 'siswa',
            ]);
            $siswa->user_id = $user->id;
            $siswa->save();
        } else {
            $siswa->user->update([
                'name'  => $request->nama,
                'email' => $request->email,
            ]);
        }

        // Update data siswa
        $siswa->update([
            'nama'     => $request->nama,
            'nis'      => $request->nis,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);

        if ($siswa->user) {
            $siswa->user->delete();
        }

        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
