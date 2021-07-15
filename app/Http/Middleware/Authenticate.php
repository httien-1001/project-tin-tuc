<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
//    Override
    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        $user = Auth::user();
        $route = $request->route()->getName();
        /*if($user->cant($route)){
            return abort(403);
        }*/
        return $next($request);
    }
}
