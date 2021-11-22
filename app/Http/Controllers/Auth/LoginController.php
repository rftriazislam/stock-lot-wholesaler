<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    protected function redirectTo()
    {

        if (Auth::user()->role == 'admin') {
            return route('admin');
        } elseif (Auth::user()->role == 'merchant') {
            return route('merchant');
        } elseif (Auth::user()->role == 'reseller') {
            return route('reseller');
        }
    }


    public function logincart(Request $request)
    {
        $validate = $this->validate($request, [
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($validate)) {
            return back()->with('message', 'error');
        }
        return back()->with('message', 'success');
    }

    public function affiliate_link(Request $request, $id)
    {
        $request['id'] = $id;
        $validate = $this->validate($request, [
            'id' => 'required|exists:users,id',
        ]);
        $id = $id;
        return view('auth.register', compact('id'));
    }
}