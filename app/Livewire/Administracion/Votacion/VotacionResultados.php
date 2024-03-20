<?php

namespace App\Livewire\Administracion\Votacion;

use App\Models\Socio;
use App\Models\Votacion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.administracion.administracion')]
class VotacionResultados extends Component
{
    public $eleccionId;
    public $votantes;
    public $noVotantes;
    public $resultados;
    public $cantidadVotantes = 0;

    public function mount($id)
    {
        $eleccionId = $id;

        $this->eleccionId = $eleccionId;

        $this->cantidadVotantes = Socio::count();

        $this->votantes = DB::table('socios')
            ->leftJoin('votacions', function ($join) {
                $join->on('socios.id', '=', 'votacions.socio_id')
                    ->where('votacions.eleccion_id', '=', $this->eleccionId);
            })
            ->select('socios.*', 'votacions.candidato_id')
            ->whereNotNull('votacions.socio_id')
            ->get();

        $this->votantes = DB::table('socios')
            ->leftJoin('votacions', function ($join) use ($eleccionId) {
                $join->on('socios.id', '=', 'votacions.socio_id')
                    ->where('votacions.eleccion_id', '=', $eleccionId);
            })
            ->select('socios.*', 'votacions.candidato_id') // También seleccionamos el ID del candidato para saber por quién votó el socio
            ->whereNotNull('votacions.socio_id')
            ->get();

        $this->noVotantes = DB::table('socios')
            ->leftJoin('votacions', function ($join) {
                $join->on('socios.id', '=', 'votacions.socio_id')
                    ->where('votacions.eleccion_id', '=', $this->eleccionId);
            })
            ->select('socios.*')
            ->whereNull('votacions.socio_id')
            ->get();

        $this->resultados = DB::table('candidatos')
            ->leftJoin('votacions', function ($join) use ($eleccionId) {
                $join->on('candidatos.id', '=', 'votacions.candidato_id')
                    ->where('votacions.eleccion_id', '=', $eleccionId);
            })
            ->join('socios', 'candidatos.socio_id', '=', 'socios.id')
            ->where('candidatos.eleccion_id', '=', $eleccionId)
            ->groupBy(
                'candidatos.id',
                'candidatos.numero_candidato',
                'socios.id',
                'socios.nombres',
                'socios.apellido_paterno',
                'socios.apellido_materno'
            )
            ->select(
                'candidatos.id as candidato_id',
                'candidatos.numero_candidato',
                'socios.id as socio_id',
                'socios.nombres',
                'socios.apellido_paterno',
                'socios.apellido_materno',
                DB::raw('COALESCE(count(votacions.id), 0) as total_votos')
            )
            ->orderBy('total_votos', 'desc')
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.administracion.votacion.votacion-resultados', [
            'votantes' => $this->votantes,
            'noVotantes' => $this->noVotantes,
            'resultados' => $this->resultados,
        ]);
    }
}
