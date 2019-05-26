<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Denied_Cus_Emp
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
        if(Auth::check()&&Auth::user()->roles<=3)
        return $next($request);
    else {
        
        // return về route 404-------

        return redirect()->back();
    }
    }
}
