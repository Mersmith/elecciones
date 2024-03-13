<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function vistaCrear()
    {
        $roles = Rol::all();

        return view('administracion.usuario.crear', compact('roles'));
    }

    public function crear(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('administracion.usuario.todas')->with('mensajeCrud', 'Se creo correctamente.');
    }

    public function vistaVer($id)
    {
        $usuario = User::find($id);
        return view('administracion.usuario.ver', compact('usuario'));
    }

    public function vistaEditar($id)
    {
        $usuario = User::find($id);
        return view('administracion.usuario.editar', compact('usuario'));
    }

    public function editar(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->nombre = $request->nombre;
        $usuario->save();

        return redirect()->route('administracion.usuario.todas')->with('mensajeCrud', 'Se edito correctamente.');
    }

    public function eliminar($id)
    {
        $usuario = User::find($id);
        $usuario->delete();

        return redirect()->route('administracion.usuario.todas')->with('mensajeCrud', 'Se elimino correctamente.');
    }

    public function vistaAsignarRol($id)
    {
        $usuario = User::with('roles')->find($id);
        $roles = Rol::all();
        return view('administracion.usuario.rol', compact('usuario', 'roles'));
    }

    public function asignarRol(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->roles()->sync($request->input('roles', []));

        return redirect()->route('administracion.usuario.todas')->with('mensajeCrud', 'Se edito correctamente.');
    }
}
