<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class dashboardMiddleware extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $guards = ['admin','doctor'];
        foreach ($guards as $guard){

        if (Auth::guard($guard)->check()) {
            return redirect()->route('ss');
        }
        }

        return $next($request);
    }
}
