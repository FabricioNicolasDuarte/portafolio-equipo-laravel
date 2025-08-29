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
 

      // Usuario Administrador: Test Admin
    User::create([
        'name' => 'Test', 'last_name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('123456789'),
        'is_admin' => true,
    ]);
}


}
