<?php

namespace App\Http\Controllers;

use App\Exports\CandidatosExport;
use App\Exports\NoVotaronExport;
use App\Exports\VotaronExport;
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

    public function exportVotaron($eleccionId)
    {
        return Excel::download(new VotaronExport($eleccionId), 'votaron.xlsx');
    }

    public function exportNoVotaron($eleccionId)
    {
        return Excel::download(new NoVotaronExport($eleccionId), 'no-votaron.xlsx');
    }
}
