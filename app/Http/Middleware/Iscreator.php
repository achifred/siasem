<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class Iscreator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard=null)
    {
        if (Auth::user()->role!="creator") {
           
            return redirect('/podcasts')->with('msg','you are not allowed here');
        }
        
        return $next($request);
    }
}
