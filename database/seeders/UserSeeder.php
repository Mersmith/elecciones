<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\Socio;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $nombre = $faker->name;
            $user = User::create([
                'name' => $nombre,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
            ]);

            //$randomRoleIds = Rol::inRandomOrder()->take(2)->pluck('id');
            //$user->roles()->syncWithoutDetaching($randomRoleIds);

            $user->roles()->attach(Rol::all()->random()->id);

            if ($user->roles()->where('nombre', 'socio')->exists()) {
                Socio::create([
                    'user_id' => $user->id,
                    'apellido_paterno' => $faker->lastName,
                    'apellido_materno' => $faker->lastName,
                    'nombres' => $nombre,
                    'codigo' => $faker->unique()->randomNumber,
                    'celular' => $faker->phoneNumber,
                    'dni' => $faker->unique()->randomNumber,
                    'sexo' => $faker->randomElement(['M', 'F']),
                    'fecha_nacimiento' => $faker->date,
                    'condicion' => $faker->randomElement(['INHABILITADO', 'HABILITADO']),
                    'grado' => $faker->randomElement(['SUPERIOR', 'SECUNDARIO', 'PRIMARIA']),
                    'direccion' => $faker->address,
                ]);
            }
        }
    }
}
