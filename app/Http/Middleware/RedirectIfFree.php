<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfFree
{

    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->buying_plan == 'free') {
            return redirect('/you/are/free');
        }

        return $next($request);
    }
}
