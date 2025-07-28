<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Obtener el rol actual del usuario autenticado
        $userRole = strtolower(Auth::user()->rol);

        // Convertir todos los roles permitidos a minúscula
        $rolesPermitidos = array_map('strtolower', $roles);

        if (!in_array($userRole, $rolesPermitidos)) {
            abort(403, 'No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}
