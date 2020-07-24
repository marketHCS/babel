<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isntDeleted
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
        if (Auth::user()->typeUser_id == 4) {
            Auth::logout();
            return redirect('/')->with('status', 'Cuenta Eliminada, por favor crea otra cuenta.');
        } else {
            return $next($request);
        }
    }
}
