<?php

namespace App\Livewire\Administracion\Usuario;

use App\Models\Rol;
use App\Models\Socio;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.administracion.administracion')]
class UsuarioCrear extends Component
{
    use WithFileUploads;

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

    public $editarImagen = null;

    public function mount()
    {
        $this->roles = Rol::all();
    }

    public function enviar()
    {
        $usuario_nuevo = new User();
        $usuario_nuevo->name = $this->nombre;
        $usuario_nuevo->email = $this->email;
        $usuario_nuevo->password = Hash::make($this->password);
        $usuario_nuevo->save();

        $usuario_nuevo->roles()->sync($this->roles_elegidos);

        if (in_array(2, $this->roles_elegidos)) {
            $socio_nuevo = new Socio();
            $socio_nuevo->user_id = $usuario_nuevo->id;
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

        if ($this->editarImagen) {
            $rules['editarImagen'] = 'required|image|max:1024';
            $imagenSubir = $this->editarImagen->store('perfiles');

            if ($socio_nuevo->imagenPerfil) {
                $imagenAntigua = $socio_nuevo->imagenPerfil;
                Storage::delete([$socio_nuevo->imagenPerfil->imagen_perfil_ruta]);

                $imagenAntigua->delete();
            }

            $socio_nuevo->imagenPerfil()->create([
                'imagen_perfil_ruta' => $imagenSubir
            ]);
        }

        $this->dispatch('mensajeCreadoLivewire', "Creado.");

        return redirect()->route('administracion.usuario.todas');
    }

    public function render()
    {
        return view('livewire.administracion.usuario.usuario-crear');
    }
}
