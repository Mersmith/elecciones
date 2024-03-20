<?php

namespace App\Exports;

use App\Models\Eleccion;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class CandidatosExport implements FromCollection
{
    protected $eleccionId;

    public function __construct($eleccionId)
    {
        $this->eleccionId = $eleccionId;
    }

    public function collection()
    {
        $eleccionId = $this->eleccionId;

        $votantes = DB::table('socios')
            ->leftJoin('votacions', function ($join) use ($eleccionId) {
                $join->on('socios.id', '=', 'votacions.socio_id')
                    ->where('votacions.eleccion_id', '=', $eleccionId);
            })
            ->leftJoin('candidatos', 'votacions.candidato_id', '=', 'candidatos.id')
            ->select('socios.*', 'votacions.ip_voto', 'votacions.created_at', 'candidatos.numero_candidato')
            ->whereNotNull('votacions.socio_id')
            ->get();

        $data = [];
        $data[] = ["N°", "Nombres", "Edad", "Exonerado mayor de 70 años", "Voto por", "IP voto", "Fecha voto"];

        foreach ($votantes as $key => $votante) {
            $exonerado = '';
            if ($votante->edad > 70) {
                $exonerado = 'EXONERADO';
            }
            $data[] = [
                $key + 1,
                "{$votante->nombres}, {$votante->apellido_paterno}, {$votante->apellido_materno}",
                $votante->edad,
                $exonerado,
                $votante->numero_candidato,
                $votante->ip_voto,
                $votante->created_at
            ];
        }

        return new Collection($data);
    }
}
