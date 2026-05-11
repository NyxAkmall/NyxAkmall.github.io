<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */

    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role != $role) {

            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard');
            }

            return redirect('/pemilahan');
        }

        return $next($request);
    }
}