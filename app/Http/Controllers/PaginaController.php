<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    /**
     * Muestra la página "Acerca de".
     */
    public function acercaDe()
    {
        return view('paginas.acerca-de');
    }
}
