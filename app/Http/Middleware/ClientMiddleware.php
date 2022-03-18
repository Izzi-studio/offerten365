<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(!Auth::guest() && Auth::user()->role_id == env('ROLE_ID_CLIENT')) {
            return $next($request);
        }else{
			return redirect('/login');
        }
    }
}
