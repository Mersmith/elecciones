<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'nombre' => $this->faker->sentence,
            'fecha_inicio' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'fecha_fin' => $this->faker->dateTimeBetween('now', '+3 months'),
        ];
    }
}
