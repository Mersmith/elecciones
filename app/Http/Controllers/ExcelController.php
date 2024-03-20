<?php

namespace App\Http\Controllers;

use App\Exports\CandidatosExport;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Models\Eleccion;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportCandidatos($eleccionId)
    {
        return Excel::download(new CandidatosExport($eleccionId), 'candidatos.xlsx');
    }
}
