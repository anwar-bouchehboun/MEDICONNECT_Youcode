<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // if (!Auth::user()->hasRole($role)) {
        //     abort(404, 'NOT FOUND.');
        // }

        return $next($request);
    }
}
