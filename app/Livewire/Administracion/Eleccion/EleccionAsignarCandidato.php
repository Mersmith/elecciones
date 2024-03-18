<?php

namespace App\Livewire\Administracion\Eleccion;

use App\Models\Candidato;
use App\Models\Eleccion;
use App\Models\Socio;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

#[Layout('layouts.administracion.administracion')]
class EleccionAsignarCandidato extends Component
{
    use WithPagination;

    public $eleccionId;
    public $eleccion;

    public $buscarSocio;
    public $buscarCandidato;

    protected $paginate = 20;

    public $socioIdSeleccionado;

    public $numero = "";

    public function mount($id)
    {
        $this->eleccionId = $id;
        $this->eleccion = Eleccion::find($id);
    }

    public function updatingBuscarSocio()
    {
        $this->resetPage();
    }

    public function updatingBuscarCandidato()
    {
        $this->resetPage();
    }

    public function asignarCandidato()
    {
        if ($this->numero) {
            $candidatoExistente = Candidato::where('eleccion_id', $this->eleccionId)
                ->where('socio_id', $this->socioIdSeleccionado)
                ->first();

            if (!$candidatoExistente) {
                Candidato::create([
                    'eleccion_id' => $this->eleccionId,
                    'socio_id' => $this->socioIdSeleccionado,
                    'numero_candidato' => $this->numero,
                ]);
                $this->dispatch('mensajeCreadoLivewire', "Asignado.");
                $this->reset(['numero', 'socioIdSeleccionado']);

                $this->resetPage();
            }
        } else {
            $this->dispatch('mensajeErrorLivewire', "Falta el número del candidato.");
        }
    }

    #[On('quitarCandidato')]
    public function quitarCandidato($socioId)
    {
        $candidato = Candidato::where('eleccion_id', $this->eleccionId)
            ->where('socio_id', $socioId)
            ->first();

        if ($candidato) {
            $candidato->delete();
            $this->dispatch('mensajeEliminadoLivewire', "Quitado.");
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = Socio::leftJoin('candidatos', function ($join) {
            $join->on('socios.id', '=', 'candidatos.socio_id')
                ->where('candidatos.eleccion_id', '=', $this->eleccionId);
        })
            ->whereNull('candidatos.socio_id');

        if (!empty($this->buscarSocio)) {
            $query->where('socios.nombres', 'like', '%' . $this->buscarSocio . '%');
        }

        $socios = $query->select('socios.*')->paginate(20);


        $queryCandidatos = DB::table('candidatos')
            ->join('socios', 'candidatos.socio_id', '=', 'socios.id')
            ->where('candidatos.eleccion_id', $this->eleccionId);

        if (!empty($this->buscarCandidato)) {
            $queryCandidatos->where('socios.nombres', 'like', '%' . $this->buscarCandidato . '%');
        }

        $candidatos = $queryCandidatos->get();

        return view('livewire.administracion.eleccion.eleccion-asignar-candidato', [
            'socios' => $socios,
            'candidatos' => $candidatos,
        ]);
    }
}
