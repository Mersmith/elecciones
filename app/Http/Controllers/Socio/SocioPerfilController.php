<?php

namespace App\Http\Controllers\Socio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocioPerfilController extends Controller
{
    public function __invoke()
    {      
        return view('socio.perfil.index');
    }
}
