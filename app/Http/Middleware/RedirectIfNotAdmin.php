<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{


    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            return redirect('/you/are/not/admin');
        }

        return $next($request);
    }

}


