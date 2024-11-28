<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika pengguna sudah login, arahkan ke /dashboard atau halaman lain yang sesuai
        if (Auth::check()) {
            return redirect('/dashboard'); // Atau sesuaikan rute
        }

        // Jika pengguna belum login, lanjutkan ke rute berikutnya
        return $next($request);
    }
}
