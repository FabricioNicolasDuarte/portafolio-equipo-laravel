<?php

use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerfilUsuarioController;
use Illuminate\Support\Facades\Route;
use App\Models\User; // <-- ¡MUY IMPORTANTE AÑADIR ESTA LÍNEA!

// --- RUTA DE BIENVENIDA ---
Route::get('/', function () {
    return view('welcome');
});

// --- RUTA DEL DASHBOARD (CON LA LÓGICA DIRECTA) ---
Route::get('/dashboard', function () {
    $alumnos = User::where('is_admin', false)->get();
    return view('dashboard', ['alumnos' => $alumnos]);
})->middleware(['auth', 'verified'])->name('dashboard');


// --- RUTAS DE PERFIL DEL USUARIO LOGUEADO ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RUTAS PARA VER PERFILES DE EQUIPO
    Route::get('/equipo', [PerfilUsuarioController::class, 'listar'])->name('equipo.listar');
    Route::get('/equipo/{usuario}', [PerfilUsuarioController::class, 'ver'])->name('equipo.ver');

    // NUEVA RUTA "ACERCA DE"
    Route::get('/acerca-de', [PaginaController::class, 'acercaDe'])->name('acerca.de');
});

// --- RUTAS DE ADMINISTRACIÓN DE USUARIOS ---
Route::middleware(['auth', 'es_admin'])->group(function () {
    // Muestra el formulario para editar un usuario específico
    Route::get('/usuarios/{usuario}/editar', [PerfilUsuarioController::class, 'editar'])
        ->name('admin.usuarios.editar');

    // Procesa la actualización de los datos de ese usuario
    Route::put('/usuarios/{usuario}', [PerfilUsuarioController::class, 'actualizar'])
        ->name('admin.usuarios.actualizar');
});


require __DIR__.'/auth.php';
