<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Eleccion;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __invoke()
    {
        $eleccion = Eleccion::find(1);

        return view('web.inicio.index', compact('eleccion'));
    }
}
