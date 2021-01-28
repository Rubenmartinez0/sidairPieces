<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckCmsPermissions
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
        $allowedRoles = [1,2,3];
        $userRole = Auth::user()->role_id;
        
        if(in_array($userRole, $allowedRoles, true)){
            return $next($request);
        }
        
        //return redirect('');
        return redirect('/')->with('fail_status', "Acceso restringido.");
    }
}
