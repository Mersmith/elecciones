<?php

namespace App\Livewire\Socio\Menu;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MenuPrincipal extends Component
{
    public $usuario;

    public function mount()
    {
        $usuario = Auth::user();
        $this->usuario = $usuario;
    }

    public function render()
    {
        return view('livewire.socio.menu.menu-principal');
    }
}
