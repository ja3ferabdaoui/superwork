<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccountStatus
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
        $response = $next($request);
        //If the status is not approved redirect to login 
        if(auth()->user()->status != 1){
            auth()->logout();
            return redirect('/login')->with('erro_login', 'Your Account is locked !');
        }
        return $response;
    }
}
