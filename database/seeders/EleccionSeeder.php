<?php

namespace Database\Seeders;

use App\Models\Eleccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EleccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eleccion::factory(2)->create();
    }
}
