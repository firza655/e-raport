<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.login');
        } elseif ($request->is('guru') || $request->is('guru/*')) {
            return route('guru.login');
        } elseif ($request->is('siswa') || $request->is('siswa/*')) {
            return route('siswa.login');
        }

        return route('pilih-login'); // default
    }
}

}
