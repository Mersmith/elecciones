<?php

namespace App\Livewire\Administrador;

use App\Models\Rol;
use Livewire\Component;

class User extends Component
{
    public $roles = [];
    public $nombre = null;
    public $email = null;
    public $password = null;
    public $roles_elegidos = [];

    public function mount()
    {
        $this->roles = Rol::all();
    }

    public function enviar()
    {
        dd($this->roles_elegidos);
    }

    public function render()
    {
        return view('livewire.administrador.user');
    }
}
