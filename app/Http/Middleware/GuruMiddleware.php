<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuruMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'guru') {
            abort(403, 'Unauthorized: Guru only.');
        }

        return $next($request);
    }
}
