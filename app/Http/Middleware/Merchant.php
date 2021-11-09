<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Merchant
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
        if (!Auth::check()) {
            return redirect()->route('login');
        } elseif (Auth::user()->role == 'admin') {
            return redirect()->route('admin');
        } elseif (Auth::user()->role == 'merchant') {
            return $next($request);
        }elseif (Auth::user()->role == 'reseller') {
            return redirect()->route('reseller');
        }
    }
}
