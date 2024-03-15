<?php

namespace App\Http\Controllers;

use App\Http\Requests\EleccionRequest;
use App\Models\Eleccion;
use Illuminate\Http\Request;

class EleccionController extends Controller
{
    public function vistaTodas()
    {
        $elecciones = Eleccion::all();
        return view('administracion.eleccion.todas', compact('elecciones'));
    }

    public function vistaCrear()
    {
        return view('administracion.eleccion.crear');
    }

    public function crear(EleccionRequest $request)
    {
        $eleccion = new Eleccion();
        $eleccion->nombre = $request->nombre;
        $eleccion->fecha_inicio = $request->fecha_inicio;
        $eleccion->fecha_fin = $request->fecha_fin;
        $eleccion->save();

        return redirect()->route('administracion.eleccion.vista.todas')->with('mensajeCrud', 'Se creo correctamente.');
    }

    public function vistaVer($id)
    {
        $eleccion = Eleccion::find($id);
        return view('administracion.eleccion.ver', compact('eleccion'));
    }

    public function vistaEditar($id)
    {
        $eleccion = Eleccion::find($id);
        return view('administracion.eleccion.editar', compact('eleccion'));
    }

    public function editar(EleccionRequest $request, $id)
    {
        $eleccion = Eleccion::findOrFail($id);
        $eleccion->nombre = $request->nombre;
        $eleccion->save();

        return redirect()->route('administracion.eleccion.vista.todas')->with('mensajeCrud', 'Se edito correctamente.');
    }

    public function eliminar($id)
    {
        $eleccion = Eleccion::find($id);
        $eleccion->delete();

        return redirect()->route('administracion.eleccion.vista.todas')->with('mensajeCrud', 'Se elimino correctamente.');
    }
}
