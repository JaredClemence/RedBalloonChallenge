<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Username
{
    /**
     * Check for null usernames. If the username is null, force the user to complete 
     * this portion of the registration process.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if( isset($user) && $user->username == null ){
            return redirect()->route('registration.username');
        }
        return $next($request);
    }
}
