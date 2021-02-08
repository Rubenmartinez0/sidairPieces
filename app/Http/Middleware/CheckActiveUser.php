<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userRoleActive = Auth::user()->active;
   
        if($userRoleActive == 1){
            return $next($request);
        }
        Auth::logout();
        return redirect('/login');
    }
}
