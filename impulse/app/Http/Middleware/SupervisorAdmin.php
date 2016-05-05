<?php

namespace App\Http\Middleware;

use Closure;
class SupervisorAdmin
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
        if($request->user()->type != 'Admin'){
            echo "No access"; 
            redirect("users"); 
        }
        return $next($request);
        
    }
 
}
