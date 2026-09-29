<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Penggunaan: ->middleware('role:admin') atau ->middleware('role:admin,superadmin')
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Jika belum login, redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // Cek apakah role user ada di daftar role yang diizinkan
        if (!in_array($userRole, $roles)) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
