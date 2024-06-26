<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerificarIngresoSocio
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('socio')) {
                return redirect()->route('socio.perfil');
            } elseif (!Auth::user()->hasRole('socio')) {
                return redirect()->route('inicio');
            } else {
                Auth::logout();
                return redirect()->route('ingresar.socio');
            }
        } else {
            return $next($request);
        }
    }
}
