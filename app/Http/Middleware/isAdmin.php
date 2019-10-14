<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
{

    public function handle($request, Closure $next,$role)
    {
        $check=Auth::check();
        if ($check){
            $user=Auth::user();
            if ($user->isAdmin($role)==true){
                return $next($request);
                return redirect('/Auth');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }
}
