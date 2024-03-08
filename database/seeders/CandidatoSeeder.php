<?php

namespace Database\Seeders;

use App\Models\Candidato;
use App\Models\Eleccion;
use App\Models\Socio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elecciones = Eleccion::limit(4)->get();
        $socios = Socio::inRandomOrder()->take(40)->get();

        foreach ($elecciones as $eleccion) {
            foreach ($socios as $socio) {
                if (!Candidato::where('eleccion_id', $eleccion->id)->where('socio_id', $socio->id)->exists()) {
                    Candidato::create([
                        'eleccion_id' => $eleccion->id,
                        'socio_id' => $socio->id,
                    ]);
                }
            }
        }
    }
}
