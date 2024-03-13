<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.administracion.administracion')]
class UsuarioTodas extends Component
{
    use WithPagination;

    public $buscarUsuario;
    public $cantidad_total_usuarios;

    protected $paginate = 15;

    public function updatingBuscarUsuario()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->cantidad_total_usuarios = User::all()->count();
    }

    public function render()
    {
        $usuarios = User::where(function ($query) {
            $query->where('name', 'like', '%' . $this->buscarUsuario . '%')
                ->orWhere('email', 'like', '%' . $this->buscarUsuario . '%');
        })
            ->select('*')
            ->paginate($this->paginate);

        return view('livewire.usuario.usuario-todas', [
            'usuarios' => $usuarios,
        ]);
    }
}
