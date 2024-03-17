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

        // Crear un usuario administrador
        $admin = User::create([
            'name' => 'Emerson Smith',
            'email' => 'mersmith14@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        $admin->roles()->attach(Rol::where('nombre', 'administrador')->first()->id);

        // Crear usuarios socios
        $socioRoleId = Rol::where('nombre', 'socio')->value('id');

        for ($i = 0; $i < 150; $i++) {
            $nombre = $faker->name;
            $user = User::create([
                'name' => $nombre,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('123456'),
            ]);

            $user->roles()->attach($socioRoleId);

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

        // Crear usuarios veedor
        /*$veedorRoleId = Rol::where('nombre', 'veedor')->value('id');

        $sociosIds = User::whereHas('roles', function ($query) {
            $query->where('nombre', 'socio');
        })->take(4)->pluck('id');

        foreach ($sociosIds as $userId) {
            $user = User::find($userId);
            $user->roles()->attach($veedorRoleId);
        }*/
    }
}
