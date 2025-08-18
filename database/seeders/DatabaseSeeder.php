<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Esta línea crea 10 usuarios de prueba con datos aleatorios.
        // Puedes descomentarla (quitarle las //) si los necesitas.
        // User::factory(10)->create();

        // Esta parte crea un usuario específico que puedes usar para iniciar sesión durante el desarrollo.
        User::factory()->create([
            'name' => 'Test User',
            'last_name' => 'User', // <-- AÑADIDO PARA SOLUCIONAR EL ERROR
            'email' => 'test@example.com',
        ]);

        // --- INICIO DE LA CORRECCIÓN ---
        // Esta es la sección que probablemente te pidieron agregar.
        // Se utiliza para llamar a otros archivos Seeder que hayas creado.
        $this->call([
        UsuarioAdministradorSeeder::class,
    ]);
    
    }
}
