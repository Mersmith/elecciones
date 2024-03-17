<?php

namespace App\Livewire\Votacion;

use App\Models\Candidato;
use App\Models\Eleccion;
use App\Models\Votacion;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VotacionVotar extends Component
{
    public $usuario;

    public $eleccionId;
    public $eleccion;

    public $buscarCandidato;
    public $candidatoId;
    public $candidatoSeleccionado;

    public $mensaje = "";

    public $rol;

    public function mount(Eleccion $eleccion)
    {
        $this->eleccionId = $eleccion->id;
        $this->eleccion = $eleccion;

        $this->usuario = auth()->user();

        if (Auth::user()->hasRole('administrador')) {
            $this->rol = "administrador";
            $this->mensaje = "Eres administrador y no puedes votar";
        } elseif (Auth::user()->hasRole('socio')) {
            $this->rol = "socio";
            $idSocio = $this->usuario->socio->id;
            $existeVotacion = Votacion::where('socio_id', $idSocio)
                ->where('eleccion_id', $eleccion->id)
                ->exists();
            if ($existeVotacion) {
                $this->mensaje = "Eres socio y puedes votar. Pero tu ya votaste";
            } else {
                $this->mensaje = "Eres socio y puedes votar. Tienes que votar";
            }
        }
    }

    public function updatingCandidatoId($candidatoId)
    {
        $this->candidatoSeleccionado = Candidato::with('socio')->find($candidatoId);
    }

    public function votarCandidato($candidatoId)
    {
        try {
            if ($this->rol != "administrador") {
                $votacion = new Votacion();
                $votacion->candidato_id = $candidatoId;
                $votacion->socio_id = $this->usuario->socio->id;
                $votacion->eleccion_id = $this->eleccionId;
                $votacion->save();

                session()->flash('message', '¡Tu voto ha sido registrado con éxito!');
            }
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

        if (!empty ($this->buscarCandidato)) {
            $queryCandidatos->where('socios.nombres', 'like', '%' . $this->buscarCandidato . '%');
        }

        $candidatos = $queryCandidatos->get();

        return view('livewire.votacion.votacion-votar', [
            'candidatos' => $candidatos,
        ]);
    }
}
