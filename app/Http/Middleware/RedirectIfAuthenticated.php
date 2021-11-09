<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (!Auth::check()) {
                    return redirect()->route('login');
                } elseif (Auth::user()->role == 'admin') {
                    return redirect()->route('admin');
                    // return redirect('/');
                } elseif (Auth::user()->role == 'merchant') {
                    return redirect()->route('merchant');
                }elseif (Auth::user()->role == 'reseller') {
                    return redirect()->route('reseller');
                } else {
                    return redirect('/');
                }
            }
        }
        return $next($request);
    }
}
