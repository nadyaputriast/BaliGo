<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Jika tidak terautentikasi, redirect ke halaman login
            return redirect()->route('login.form')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return $next($request);
    }

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        // middleware lainnya...
    ];
}