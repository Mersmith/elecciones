<?php

namespace App\Livewire\Socio\Votacion;

use App\Models\Candidato;
use App\Models\Eleccion;
use App\Models\Votacion;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

#[Layout('layouts.socio.socio')]
class VotacionVotar extends Component
{
    public $sorteado;

    public $usuario;

    public $eleccionId;
    public $eleccion;

    public $buscarCandidato;
    public $candidatoId;
    public $candidatoSeleccionado;

    public $mensaje = "";

    public function mount(Eleccion $eleccion)
    {
        $this->eleccionId = $eleccion->id;
        $this->eleccion = $eleccion;

        $this->usuario = auth()->user();

        if ($eleccion->fecha_fin_elecciones > Carbon::now()) {
            $idSocio = $this->usuario->socio->id;
            $existeVotacion = Votacion::where('socio_id', $idSocio)
                ->where('eleccion_id', $eleccion->id)
                ->exists();
            if ($existeVotacion) {
                $this->mensaje = "Ya votaste";
                return redirect()->route('socio.voto');
            } else {
                $this->mensaje = "Falta votar";
            }
        } else {
            return redirect()->route('socio.perfil');
        }

        $queryCandidatos = DB::table('candidatos')
            ->leftJoin('socios', 'candidatos.socio_id', '=', 'socios.id')
            ->leftJoin('imagen_perfils', 'socios.id', '=', 'imagen_perfils.imagen_perfilable_id')
            ->select('candidatos.id as candidato_id', 'candidatos.numero_candidato', 'socios.*', 'imagen_perfils.imagen_perfil_ruta')
            ->where('candidatos.eleccion_id', $this->eleccionId);

        $this->sorteado = $queryCandidatos->inRandomOrder()->get();
    }

    public function updatingCandidatoId($candidatoId)
    {
        $this->candidatoSeleccionado = Candidato::with('socio')->find($candidatoId);
    }

    public function votarCandidato($candidatoId, Request $request)
    {
        try {
            $votacion = new Votacion();
            $votacion->candidato_id = $candidatoId;
            $votacion->socio_id = $this->usuario->socio->id;
            $votacion->eleccion_id = $this->eleccionId;
            $votacion->ip_voto = $request->ip();
            $votacion->save();

            $this->candidatoSeleccionado->increment('cantidad_votos');

            session()->flash('message', '¡Tu voto ha sido registrado con éxito!');
            $this->mensaje = "Ya votaste";
            return redirect()->route('socio.voto');
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
        $queryCandidatos = $this->sorteado;

        if (!empty($this->buscarCandidato)) {
            $queryCandidatos = $queryCandidatos->filter(function ($candidato) {
                return stripos($candidato->nombres, $this->buscarCandidato) !== false
                    || stripos($candidato->numero_candidato, $this->buscarCandidato) !== false;
            });
        }

        return view('livewire.socio.votacion.votacion-votar', [
            'candidatos' => $queryCandidatos,
        ]);
    }
}
