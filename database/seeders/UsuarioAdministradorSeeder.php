<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    // Usuario Administrador: Docente
    User::create([
        'name' => 'Fernando', 'last_name' => 'Aguirre',
        'email' => 'ejemplo@gmail.com',
        'password' => Hash::make('123456789'), // El profe tienen que configurar todo aca
        'is_admin' => true,
    ]);

    // Usuario Administrador: Duarte Fabricio
    User::create([
        'name' => 'Fabricio', 'last_name' => 'Duarte',
        'email' => 'fabricioduarteoficial@gmail.com',
        'password' => Hash::make('123456789'),
        'is_admin' => true,
    ]);
}

}
