<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado y no es un administrador
        if (!auth()->check() || auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Acceso restringido solo para usuarios');
        }

        return $next($request);
    }
}
