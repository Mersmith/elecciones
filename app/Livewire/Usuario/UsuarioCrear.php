<?php

namespace App\Livewire\Usuario;

use App\Models\Rol;
use App\Models\Socio;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.administracion.administracion')]
class UsuarioCrear extends Component
{
    const ROL_SOCIO = 1;

    public $roles = [];
    public $nombre = null;
    public $email = null;
    public $password = null;
    public $roles_elegidos = [];

    public $apellido_paterno = null;
    public $apellido_materno = null;
    public $codigo = null;
    public $celular = null;
    public $dni = null;
    public $sexo = null;
    public $fecha_nacimiento = null;
    public $condicion = "";
    public $grado = "";
    public $direccion = null;

    public function mount()
    {
        $this->roles = Rol::all();
    }

    public function enviar()
    {
        $usuario_nuevo = new User();
        $usuario_nuevo->name  = $this->nombre;
        $usuario_nuevo->email  = $this->email;
        $usuario_nuevo->password  = $this->password;
        $usuario_nuevo->save();

        $usuario_nuevo->roles()->sync($this->roles_elegidos);

        if (in_array(2, $this->roles_elegidos)) {
            $socio_nuevo = new Socio();
            $socio_nuevo->user_id   = $usuario_nuevo->id;
            $socio_nuevo->apellido_paterno = $this->apellido_paterno;
            $socio_nuevo->apellido_materno = $this->apellido_materno;
            $socio_nuevo->nombres = $this->nombre;
            $socio_nuevo->codigo = $this->codigo;
            $socio_nuevo->celular = $this->celular;
            $socio_nuevo->dni = $this->dni;
            $socio_nuevo->sexo = $this->sexo;
            $socio_nuevo->fecha_nacimiento = $this->fecha_nacimiento;
            $socio_nuevo->condicion = $this->condicion;
            $socio_nuevo->grado = $this->grado;
            $socio_nuevo->direccion = $this->direccion;
            $socio_nuevo->save();
        }
    }

    public function render()
    {
        return view('livewire.usuario.usuario-crear');
    }
}
