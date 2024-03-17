<?php

namespace App\Livewire\Sesion\Socio;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;

#[Layout('layouts.sesion.sesion')]
class SocioIngresar extends Component
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
        $this->validate();

        $credentials = [
            'password' => $this->password,
        ];
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $this->email;
        } else {
            $credentials['username'] = $this->email;
        }
        if (Auth::attempt($credentials, $this->recordarme)) {
            $usuario = Auth::user();

            if ($usuario->hasRole('socio')) {
                return redirect()->route('administracion.socio.vista.todas');
            } else {
                Auth::logout();
                return redirect()->route('ingresar.socio');
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
        return view('livewire.sesion.socio.socio-ingresar');
    }
}
