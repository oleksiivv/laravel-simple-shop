<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Authenticate extends Middleware
{
    // protected $guards;

    // public function handle($request, Closure $next, ...$guards)
    // {
    //     if (Auth::guard($guards)->check()) {
    //         return redirect('/'); 
    //     }

    //     return $next($request);
    // }

    /**
      * Get the path the user should be redirected to when they are not authenticated.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return string|null
    */
     protected function redirectTo($request)
     {
         if(!Auth::check() ){
             Auth::logout();
             $request->session()->invalidate();
             $request->session()->regenerateToken();
             return route('login');
         }
         if (! $request->expectsJson()) {
             return route('login');
         }
     }   

}
