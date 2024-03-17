<?php

namespace App\Livewire\Administracion\Administrador;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.administracion.administracion')]
class AdministradorTodas extends Component
{
    use WithPagination;

    public $buscarAdministrador;
    public $cantidad_total_administradores;

    protected $paginate = 15;

    public function updatingBuscarAdministrador()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->cantidad_total_administradores = DB::table('users')
            ->join('user_rols', 'users.id', '=', 'user_rols.user_id')
            ->join('rols', 'user_rols.rol_id', '=', 'rols.id')
            ->where('rols.nombre', '=', 'administrador')
            ->select('users.*')
            ->count();
    }

    public function render()
    {
        $administradores = DB::table('users')
            ->join('user_rols', 'users.id', '=', 'user_rols.user_id')
            ->join('rols', 'user_rols.rol_id', '=', 'rols.id')
            ->where('rols.nombre', '=', 'administrador')
            ->where(function ($query) {
                $query->where('users.name', 'like', '%' . $this->buscarAdministrador . '%')
                    ->orWhere('users.email', 'like', '%' . $this->buscarAdministrador . '%');
            })
            ->select('users.*')
            ->paginate($this->paginate);

        return view('livewire.administracion.administrador.administrador-todas', [
            'administradores' => $administradores,
        ]);
    }
}
