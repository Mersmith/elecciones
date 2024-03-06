<?php

namespace App\Livewire\Administrador;

use App\Models\Eleccion;
use App\Models\Socio;
use Livewire\Component;
use Livewire\WithPagination;

class EleccionAsigarCandidato extends Component
{
    use WithPagination;

    public $eleccionId;
    public $eleccion;

    public $buscarSocio;

    protected $paginate = 10;

    public function updatingBuscarSocio()
    {
        $this->resetPage();
    }

    public function mount($id)
    {
        $this->eleccionId = $id;
        $this->eleccion = Eleccion::find($id);
    }

    public function render()
    {
        $socios = Socio::where('nombres', 'like', '%' . $this->buscarSocio . '%')
            ->paginate(10);

        return view('livewire.administrador.eleccion-asigar-candidato', [
            'socios' => $socios,
        ]);
    }
}
