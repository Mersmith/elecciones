<?php

namespace App\Http\Controllers\Socio;

use App\Http\Controllers\Controller;
use App\Models\Eleccion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MisEleccionesController extends Controller
{
    public function __invoke()
    {
        $usuario = auth()->user();
        $idSocio = $usuario->socio->id;

        $eleccionesActivas = Eleccion::where('fecha_fin_elecciones', '>', Carbon::now())
        ->whereNotExists(function ($query) use ($idSocio) {
            $query->select(DB::raw(1))
                ->from('votacions')
                ->whereColumn('votacions.eleccion_id', 'eleccions.id')
                ->where('votacions.socio_id', $idSocio);
        })
        ->orderBy('fecha_fin_elecciones', 'asc')
        ->get();

        return view('socio.eleccion.index', compact('eleccionesActivas'));
    }
}
