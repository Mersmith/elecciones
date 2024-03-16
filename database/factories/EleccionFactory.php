<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eleccion>
 */
class EleccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fecha_fin_convocatoria = $this->faker->dateTimeBetween('+1 month', '+2 months')->format('Y-m-d H:i:s');

        $fecha_inicio_convocatoria = date('Y-m-d H:i:s', strtotime('-1 month', strtotime($fecha_fin_convocatoria)));

        $fecha_inicio_elecciones = date('Y-m-d H:i:s', strtotime('today 08:00:00'));
        $fecha_fin_elecciones = date('Y-m-d H:i:s', strtotime('today 18:00:00'));

        $nombre = $this->faker->sentence(1);

        return [
            'nombre' => $nombre,
            'fecha_inicio_convocatoria' => $fecha_inicio_convocatoria,
            'fecha_fin_convocatoria' => $fecha_fin_convocatoria,
            'fecha_inicio_elecciones' => $fecha_inicio_elecciones,
            'fecha_fin_elecciones' => $fecha_fin_elecciones,
            'slug' => Str::slug($nombre),
        ];
    }
}
