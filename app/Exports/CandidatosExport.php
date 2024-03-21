<?php

namespace App\Exports;

use App\Models\Eleccion;
use App\Models\User;
use App\Models\Votacion;
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

        $cantidad_votaron = Votacion::where('eleccion_id', $eleccionId)->count();

        $resultados = DB::table('candidatos')
            ->leftJoin('votacions', function ($join) use ($eleccionId) {
                $join->on('candidatos.id', '=', 'votacions.candidato_id')
                    ->where('votacions.eleccion_id', '=', $eleccionId);
            })
            ->join('socios', 'candidatos.socio_id', '=', 'socios.id')
            ->where('candidatos.eleccion_id', '=', $eleccionId)
            ->groupBy(
                'candidatos.id',
                'candidatos.numero_candidato',
                'socios.id',
                'socios.nombres',
                'socios.apellido_paterno',
                'socios.apellido_materno'
            )
            ->select(
                'candidatos.id as candidato_id',
                'candidatos.numero_candidato',
                'socios.id as socio_id',
                'socios.nombres',
                'socios.apellido_paterno',
                'socios.apellido_materno',
                DB::raw('COALESCE(count(votacions.id), 0) as total_votos')
            )
            ->orderBy('total_votos', 'desc')
            ->get();

        $data = [];
        $data[] = ["N°", "Número candidato", "Nombres y apellidos", "Cantidad votos", "Porcentaje votos"];

        foreach ($resultados as $key => $resultado) {
            $porcentajeVotos = ($resultado->total_votos / $cantidad_votaron) * 100;

            $data[] = [
                $key + 1,
                $resultado->numero_candidato,
                "{$resultado->nombres}, {$resultado->apellido_paterno}, {$resultado->apellido_materno}",
                $resultado->total_votos,
                $porcentajeVotos
            ];
        }

        return new Collection($data);
    }
}
