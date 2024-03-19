<?php

namespace App\Livewire\Sesion\Administrador;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Hash;

#[Layout('layouts.sesion.sesion')]
class AdministradorIngresar extends Component
{
    public $email;
    public $password;
    public $recordarme;

    protected $rules = [
        'email' => 'required',
        'password' => 'required',
    ];

    protected $validationAttributes = [
        'email' => 'email o usuario',
        'password' => 'contraseña',
    ];

    protected $messages = [
        'email.required' => 'El :attribute es requerido.',
        'password.required' => 'La :attribute es requerido.',
    ];

    public function ingresar()
    {
        /*$users = User::all();

        foreach ($users as $user) {
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($user->password);
                $user->save();
            }
        }*/

        $this->validate();

        $credentials = [
            'password' => $this->password,
        ];
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $this->email;
        } else {
            $credentials['dni'] = $this->email;
        }
        if (Auth::attempt($credentials, $this->recordarme)) {
            $usuario = Auth::user();

            if ($usuario->hasRole('administrador')) {
                return redirect()->route('administracion.usuario.todas');
            } else {
                Auth::logout();
                return redirect()->route('ingresar.administrador');
            }
        } else {
            $errors = ['email' => 'Email o usuario incorrecto.'];
            if (User::where('email', $this->email)->count() > 0) {
                $errors = ['password' => 'La contraseña es incorrecta.'];
            }
            throw ValidationException::withMessages($errors);
        }
    }

    public function render()
    {
        return view('livewire.sesion.administrador.administrador-ingresar');
    }
}
