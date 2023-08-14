<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
Use Auth;

class Receptionis
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
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->role == 'resepsionis'){
            return $next($request);
        }
        return redirect()->back()->with('error',"Anda tidak dapat mengakses halaman ini!");
    }
}
