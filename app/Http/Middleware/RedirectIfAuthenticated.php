<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $angka = 1;
            return redirect('/')->with(['success' => 'Login Berhasil']);
        }
        // else{
        //     echo "masuk sini";
        //     return redirect('/')->with(['error' => 'Login Terlebih Dahulu']);
        // }
        return $next($request)->with(['success' => 'Login Berhasil']);
    }
}
