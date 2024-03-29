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
    public $votantesBlanco;
    public $noVotantes;
    public $resultados;
    public $cantidadVotantes = 0;
    public $idVotoNulo = 47;

    public function mount($id)
    {
        $eleccionId = $id;

        $this->eleccionId = $eleccionId;

        $this->cantidadVotantes = Socio::count();

        $this->votantes = DB::table('socios')
            ->leftJoin('votacions', function ($join) use ($eleccionId) {
                $join->on('socios.id', '=', 'votacions.socio_id')
                    ->where('votacions.eleccion_id', '=', $eleccionId);
            })
            ->leftJoin('candidatos', 'votacions.candidato_id', '=', 'candidatos.id')
            ->select('socios.*', 'votacions.ip_voto', 'votacions.created_at', 'candidatos.numero_candidato')
            ->whereNotNull('votacions.socio_id')
            ->where('votacions.candidato_id', '!=', $this->idVotoNulo)
            ->get();

        $this->votantesBlanco = DB::table('socios')
            ->leftJoin('votacions', function ($join) use ($eleccionId) {
                $join->on('socios.id', '=', 'votacions.socio_id')
                    ->where('votacions.eleccion_id', '=', $eleccionId);
            })
            ->leftJoin('candidatos', 'votacions.candidato_id', '=', 'candidatos.id')
            ->select('socios.*', 'votacions.ip_voto', 'votacions.created_at', 'candidatos.numero_candidato')
            ->whereNotNull('votacions.socio_id')
            ->where('votacions.candidato_id', '=', $this->idVotoNulo)
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
            ->leftJoin('socios', 'candidatos.socio_id', '=', 'socios.id')
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
