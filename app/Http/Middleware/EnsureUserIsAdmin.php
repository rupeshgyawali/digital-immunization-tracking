<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
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
        // if (!$request->user()->is_admin) {
        //     throw new AuthenticationException(
        //         'Unauthorised.',
        //         [],
        //         $this->redirectTo($request)
        //     );
        // }
        // return $next($request);
        if(Auth::user()->usertype == 'admin')
       {
        return $next($request);
       }
       else
       {
        return redirect ('/home')->with('status','You are not allowed to Admin Dashboard');
       }
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('/home');
        }
    }
}
