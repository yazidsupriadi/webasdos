<?php

namespace App\Http\Middleware;

use Closure;

class IsAsdos
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
        if (\Auth::user()->rules == 'asdos') {
        return $next($request);
        }
    
          return redirect('/');

    }
}
