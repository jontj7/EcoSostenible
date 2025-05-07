<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->email !== 'bm61883@gmail.com') {
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
