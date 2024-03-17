<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Eleccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function __invoke()
    {
        $eleccion = Eleccion::find(1);
        $socio = null;
        
        if (Auth::check()) {
            if (Auth::user()->hasRole('socio')) {
                $usuario = auth()->user();
                $socio = $usuario->socio;
            }
        }

        return view('web.inicio.index', compact('eleccion', 'socio'));
    }
}
