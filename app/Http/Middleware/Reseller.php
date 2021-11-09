<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Reseller
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
            return redirect()->route('merchant');
        }elseif (Auth::user()->role == 'reseller') {
            return $next($request); 
        }
    }
}
