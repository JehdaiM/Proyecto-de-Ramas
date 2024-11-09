<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado y es un administrador
        if (!auth()->check() || auth()->user()->role != 'admin') {
            return redirect()->route('home')->with('error', 'Acceso restringido solo para administradores');
        }

        return $next($request);
    }
}
