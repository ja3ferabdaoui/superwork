<?php

namespace SuperWorks\Http\Middleware;

use Closure;

class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     *Your custom message here.
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
            
            return redirect('/login')->withErrors(['locked' => ["Votre compte est bloquée ! Contactez l'adlinistrateur"]]);
        }
        return $response;
    }
}
