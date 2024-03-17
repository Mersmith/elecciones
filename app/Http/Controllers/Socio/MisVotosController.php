<?php

namespace App\Http\Controllers\Socio;

use App\Http\Controllers\Controller;
use App\Models\Votacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MisVotosController extends Controller
{
    public function __invoke()
    {
        $usuario = auth()->user();
        $socioId = $usuario->socio->id;

        $votos = DB::table('votacions')
            ->join('candidatos', 'votacions.candidato_id', '=', 'candidatos.id')
            ->join('eleccions', 'votacions.eleccion_id', '=', 'eleccions.id')
            ->join('socios', 'candidatos.socio_id', '=', 'socios.id')
            ->where('votacions.socio_id', $socioId)
            ->select('votacions.*', 'socios.nombres as nombre_candidato', 'eleccions.nombre as nombre_eleccion')
            ->get();

        return view('socio.voto.index', compact('votos'));
    }
}
