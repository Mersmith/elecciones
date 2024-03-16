<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerificarIngreso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            /*if (Auth::user()->hasRole('administrador')) {
                return redirect()->route('administracion.usuario.todas');
            }*/
            return redirect()->route('inicio');
        } else {
            return redirect()->route('ingresar.administrador');
        }

        return $next($request);
    }
}
