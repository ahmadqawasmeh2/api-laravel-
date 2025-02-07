<?php

namespace App\Http\Middleware;

use Closure;

class Changelaunage
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
        
        if(isset(request()->lang) &&request()->lang=='en')
        {
            app()->setlocale('en');
        }
        else
        {
            app()->setlocale('ar');
        }
        return $next($request);
    }
}
