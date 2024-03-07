<?php

namespace App\Livewire\Administrador;

use App\Models\Socio;
use App\Models\Votacion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class VotacionResultados extends Component
{
    public $eleccionId;
    public $votantes;
    public $noVotantes;
    public $resultados;

    public function mount($id)
    {
        $this->eleccionId = $id;

        $this->votantes = DB::table('socios')
            ->leftJoin('votacions', function ($join) {
                $join->on('socios.id', '=', 'votacions.socio_id')
                    ->where('votacions.eleccion_id', '=', $this->eleccionId);
            })
            ->select('socios.*')
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

        $this->resultados = DB::table('votacions')
            ->join('candidatos', 'votacions.candidato_id', '=', 'candidatos.id')
            ->join('socios', 'candidatos.socio_id', '=', 'socios.id')
            ->where('votacions.eleccion_id', $this->eleccionId)
            ->groupBy('votacions.candidato_id', 'socios.id', 'socios.nombres')
            ->select(
                'votacions.candidato_id',
                'socios.id as socio_id',
                'socios.nombres as nombres',
                DB::raw('count(*) as total_votos')
            )
            ->orderBy('total_votos', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.administrador.votacion-resultados', [
            'votantes' => $this->votantes,
            'noVotantes' => $this->noVotantes,
            'resultados' => $this->resultados,
        ]);
    }
}
