<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('user_id')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
