<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     if (Auth::user()->getRoles('administrator')) {
        //         return redirect('/home');
        //     }
        //     elseif(Auth::user()->getRoles('counselor-hod')) {
        //         return redirect('/foundation-classes-batches/'.\Crypt::encrypt(Auth::user()->id));
        //     }
        //     elseif(Auth::user()->getRoles('counter-hod')) {
        //         return redirect('/locations/view-attendance-data/'.\Crypt::encrypt(Auth::user()->id));
        //     }

        // }

        return $next($request);
    }
}
