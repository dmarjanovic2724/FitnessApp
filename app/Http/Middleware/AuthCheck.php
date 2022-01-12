<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        $role=session('role');
          
        if(!session()->has('LoggedUser') && ($request->path() !='auth/login' && $request->path() !='auth/registry')){
            
            return redirect('auth/login')->with('fail','you mast be logged in');
        }
        if(session()->has('LoggedUser') && $role ==0 && (($request->path() == 'auth/user/dashboard') || ($request->path()=='auth/login') || ($request->path() =='auth/registry')))
        {
         
            return back();
        }
        if(session()->has('LoggedUser') && $role ==1 && (($request->path() == 'auth/admin/dashboard') || ($request->path()=='auth/login') || ($request->path() =='auth/registry')))
        {
         
            return back();
        }

        return $next($request);
    }
}
