<?php

namespace App\Http\Middleware;

use Closure;

class guestStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if( !\Auth::guard($guard)->check()){
            return $next($request);
        }else{
            return redirect()->route('front.login');
        }
    }
}
