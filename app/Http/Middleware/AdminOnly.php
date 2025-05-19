<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->email !== 'user@gmail.com') {
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
