<?php

namespace App\Http\Controllers;

use App\Models\Votacion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generarConstanciaVotacion($votoId)
    {
        $votacion = Votacion::findOrFail($votoId);

        $candidato = $votacion->candidato;
        $socio = $votacion->socio;
        $eleccion = $votacion->eleccion;

        $titulo = "Constancia de votación";

        $data = [
            'title' => $titulo,
            'candidato' => $candidato,
            'socio' => $socio,
            'eleccion' => $eleccion,
        ];

        /*$pdf = PDF::loadView('pdf.constancia-votacion', $data);
        return $pdf->download('constancia-de-votacion.pdf');*/
        return view('pdf.constancia-votacion', compact('votacion', 'candidato', 'socio', 'eleccion', 'titulo'));

    }
}
