<?php

namespace App\Livewire\Administracion\Socio;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.administracion.administracion')]
class SocioTodas extends Component
{
    use WithPagination;

    public $buscarSocio;
    public $cantidad_total_socios;

    protected $paginate = 15;

    public function updatingBuscarSocio()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->cantidad_total_socios = DB::table('users')
            ->join('user_rols', 'users.id', '=', 'user_rols.user_id')
            ->join('rols', 'user_rols.rol_id', '=', 'rols.id')
            ->join('socios', 'users.id', '=', 'socios.user_id')
            ->where('rols.nombre', '=', 'socio')
            ->count();
    }

    public function render()
    {
        $socios = DB::table('users')
            ->join('user_rols', 'users.id', '=', 'user_rols.user_id')
            ->join('rols', 'user_rols.rol_id', '=', 'rols.id')
            ->join('socios', 'users.id', '=', 'socios.user_id')
            ->where('rols.nombre', '=', 'socio')
            ->where(function ($query) {
                $query->where('socios.nombres', 'like', '%' . $this->buscarSocio . '%')
                    ->orWhere('socios.apellido_paterno', 'like', '%' . $this->buscarSocio . '%');
            })
            ->select('socios.*')
            ->paginate($this->paginate);

        return view('livewire.administracion.socio.socio-todas', [
            'socios' => $socios,
        ]);
    }
}
