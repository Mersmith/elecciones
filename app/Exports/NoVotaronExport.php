<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class NoVotaronExport implements FromCollection
{
    protected $eleccionId;

    public function __construct($eleccionId)
    {
        $this->eleccionId = $eleccionId;
    }

    public function collection()
    {
        $eleccionId = $this->eleccionId;

        $noVotantes = DB::table('socios')
            ->leftJoin('votacions', function ($join) {
                $join->on('socios.id', '=', 'votacions.socio_id')
                    ->where('votacions.eleccion_id', '=', $this->eleccionId);
            })
            ->select('socios.*')
            ->whereNull('votacions.socio_id')
            ->get();

        $data = [];
        $data[] = ["N°", "Código socio", "Nombres y apellidos", "DNI", "Fecha nacimiento", "Edad", "Exonerado mayor de 70 años"];

        foreach ($noVotantes as $key => $noVotante) {
            $exonerado = '';
            if ($noVotante->edad > 70) {
                $exonerado = 'EXONERADO';
            }
            $data[] = [
                $key + 1,
                $noVotante->codigo,
                "{$noVotante->nombres}, {$noVotante->apellido_paterno}, {$noVotante->apellido_materno}",
                $noVotante->dni,
                $noVotante->fecha_nacimiento,
                $noVotante->edad,
                $exonerado
            ];
        }

        return new Collection($data);
    }
}
