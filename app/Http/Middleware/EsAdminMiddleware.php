<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si el usuario está logueado Y es administrador...
        if (auth()->check() && auth()->user()->is_admin) {
            // ...déjalo pasar a la siguiente parte de la aplicación.
            return $next($request);
        }

        // Si no cumple la condición, detiene la solicitud y muestra un error "403 Prohibido".
        abort(403, 'Acceso no autorizado.');
    }
}