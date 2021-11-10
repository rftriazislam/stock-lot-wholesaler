<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ResellerController extends Controller
{
    public function index()
    {
        return view('reseller.main.home');
    }
    public function myprofile()
    {
        return view('reseller.my_profile.view');
    }

    public function update_profile(Request $request)
    {

        $user = User::where('id', Auth::user()->id)->first();
        if ($user) {
            $user->update($request->all());

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imagename =  Auth::user()->id . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/storage/profile');
                $image->move($destinationPath, $imagename);
                $user->update([
                    'image' => $imagename
                ]);
            }
        }
        return back();
    }
}