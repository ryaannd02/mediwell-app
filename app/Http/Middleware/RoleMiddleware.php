<?php
namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
public function handle($request, Closure $next, $role)
{
    if (!auth()->check()) {
        dd('Belum login', auth()->user());
    }

    if (auth()->user()->role !== $role) {
        dd('Role tidak cocok', auth()->user()->role, 'dibutuhkan:', $role);
    }

    return $next($request);
}
}