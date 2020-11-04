<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserNoAdminMiddleware
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
//        if(Auth::check() && Auth::user()->role_id == 2 && Auth::user()->status == 0)
        if(Auth::check() && Auth::user()->role_id == 2)
        {
            return $next($request);
            //  echo Auth::user()->avatar;
        }
        abort(404);
    }
}
