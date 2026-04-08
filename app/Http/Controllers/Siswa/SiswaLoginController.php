<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\User;

class SiswaLoginController extends Controller
{
    /**
     * Tampilkan form login siswa.
     */
    public function showLoginForm()
    {
        if (Auth::guard('siswa')->check()) {
            return redirect()->route('siswa.dashboard');
        }

        return view('siswa.login');
    }

    /**
     * Proses login siswa.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        $siswa = User::where('email', $request->email)->where('role', 'siswa')->first();

        if ($siswa && Hash::check($request->password, $siswa->password)) {
            Auth::guard('siswa')->login($siswa);
            $request->session()->regenerate();

            return redirect()->intended(route('siswa.dashboard'))
                ->with('success', 'Selamat datang, ' . $siswa->nama . '!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    /**
     * Logout siswa.
     */
    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('siswa.login');
    }
}
