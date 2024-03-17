<?php

namespace App\Http\Controllers\Socio;

use App\Http\Controllers\Controller;
use App\Models\Eleccion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MisEleccionesController extends Controller
{
    public function __invoke()
    {
        $eleccionesActivas = Eleccion::where('fecha_fin_elecciones', '>', Carbon::now())
            ->orderBy('fecha_fin_elecciones', 'asc')
            ->get();

        return view('socio.eleccion.index', compact('eleccionesActivas'));
    }
}
