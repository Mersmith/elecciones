<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function vistaTodas()
    {
        $roles = Rol::all();
        return view('administrador.rol.todas', compact('roles'));
    }

    public function vistaCrear()
    {
        return view('administrador.rol.crear');
    }

    public function crear(Request $request)
    {
        $rol = new Rol();
        $rol->nombre = $request->nombre;
        $rol->save();

        return redirect()->route('rol.vista.todas')->with('mensajeCrud', 'Se creo correctamente.');
    }

    public function vistaVer($id)
    {
        $rol = Rol::find($id);
        return view('administrador.rol.ver', compact('rol'));
    }

    public function vistaEditar($id)
    {
        $rol = Rol::find($id);
        return view('administrador.rol.editar', compact('rol'));
    }

    public function editar(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->nombre = $request->nombre;
        $rol->save();

        return redirect()->route('rol.vista.todas')->with('mensajeCrud', 'Se edito correctamente.');
    }

    public function eliminar($id)
    {
        $rol = Rol::find($id);
        $rol->delete();

        return redirect()->route('rol.vista.todas')->with('mensajeCrud', 'Se elimino correctamente.');
    }
}
