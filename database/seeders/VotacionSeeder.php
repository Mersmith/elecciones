<?php

namespace Database\Seeders;

use App\Models\Candidato;
use App\Models\Eleccion;
use App\Models\Socio;
use App\Models\Votacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VotacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elecciones = Eleccion::limit(4)->get();

        foreach ($elecciones as $eleccion) {
            $candidatos = Candidato::where('eleccion_id', $eleccion->id)->get();

            $socios = Socio::inRandomOrder()->take(40)->get();

            foreach ($socios as $socio) {
                $candidatoAleatorio = $candidatos->random();

                if (!Votacion::where('eleccion_id', $eleccion->id)->where('socio_id', $socio->id)->exists()) {
                    Votacion::create([
                        'candidato_id' => $candidatoAleatorio->id,
                        'socio_id' => $socio->id,
                        'eleccion_id' => $eleccion->id,
                    ]);
                }
            }
        }
    }
}
