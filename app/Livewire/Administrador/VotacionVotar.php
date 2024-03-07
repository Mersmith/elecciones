<?php

namespace App\Livewire\Administrador;

use App\Models\Candidato;
use App\Models\Eleccion;
use App\Models\Votacion;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class VotacionVotar extends Component
{
    public $usuario;

    public $eleccionId;
    public $eleccion;

    public $buscarCandidato;
    public $candidatoId;
    public $candidatoSeleccionado;

    public function mount($id)
    {
        $this->usuario = auth()->user();

        $this->eleccionId = $id;
        $this->eleccion = Eleccion::find($id);
    }

    public function updatingCandidatoId($candidatoId)
    {
        $this->candidatoSeleccionado = Candidato::with('socio')->find($candidatoId);
    }

    public function votarCandidato($candidatoId)
    {
        try {
            $votacion = new Votacion();
            $votacion->candidato_id = $candidatoId;
            $votacion->socio_id = $this->usuario->socio->id;
            $votacion->eleccion_id = $this->eleccionId;
            $votacion->save();

            session()->flash('message', '¡Tu voto ha sido registrado con éxito!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                session()->flash('error', 'Usted ya ha votado en esta elección y no puede votar otra vez.');
            } else {
                session()->flash('error', 'Error al votar: ' . $e->getMessage());
            }
        }
    }

    public function render()
    {
        $queryCandidatos = DB::table('candidatos')
            ->join('socios', 'candidatos.socio_id', '=', 'socios.id')
            ->select('candidatos.id as candidato_id', 'socios.*')
            ->where('candidatos.eleccion_id', $this->eleccionId);

        if (!empty($this->buscarCandidato)) {
            $queryCandidatos->where('socios.nombres', 'like', '%' . $this->buscarCandidato . '%');
        }

        $candidatos = $queryCandidatos->get();

        return view('livewire.administrador.votacion-votar', [
            'candidatos' => $candidatos,
        ]);
    }
}
