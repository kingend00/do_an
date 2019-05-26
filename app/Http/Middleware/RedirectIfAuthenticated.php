<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->roles<=2)
                return redirect()->route('B_user.index');
            elseif(Auth::user()->roles==3) {
                return redirect()->route("B_booktable.index");
            }
            else {
                return redirect()->route("index");
            }
        }

        return $next($request);
    }
}
