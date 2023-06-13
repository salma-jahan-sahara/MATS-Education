<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthStuduent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(($request->session()->get('type'))=="student"){
            return $next($request);
        }else{
            return redirect()->route('signin'); 
        }
      
    }
}
