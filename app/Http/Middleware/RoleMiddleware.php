<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
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
        if(!Auth::check()){
            return redirect()->route('system.login');
        }
        if(Auth::check()){
            if(auth()->user()->role==2){
                return new Response(view('unauthorized')->with('role', 'ADMIN'));
            }
        }
        return $next($request);
    }
}
