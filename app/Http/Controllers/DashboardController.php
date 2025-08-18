<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard de la aplicación.
     */
    public function index(): View
    {
        // Buscamos todos los usuarios donde 'is_admin' sea falso.
        $alumnos = User::where('is_admin', false)->get();

        // Pasamos la variable 'alumnos' a la vista.
        return view('dashboard', ['alumnos' => $alumnos]);
    }
}