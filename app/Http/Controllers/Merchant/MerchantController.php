<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\MerchantShop;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class MerchantController extends Controller
{
    public function index()
    {
        return view('merchant.main.home');
    }
    public function add_shop()
    {
        $merchant = MerchantShop::where('user_id', Auth::user()->id)->first();
        if ($merchant) {
            return view('merchant.shop.view', compact('merchant'));
        } else {

            return view('merchant.shop.create');
        }
    }

    public function save_shop(Request $request)
    {
        $validate =  $this->validate($request, [
            'name' => 'required|unique:merchant_shops,name',
            'whatsapp_number' => 'required',
            'telegram_number' => 'required',
            'fb_page' => 'required',
            'address' => 'required',
            'logo' => 'required|image|mimes:jpg,png,jpeg',
            'nid_front' => 'required|image|mimes:jpg,png,jpeg',
            'nid_back' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/merchant/logo');
            $image->move($destinationPath, $imagename);
            $validate['logo'] = $imagename;
        }
        if ($request->hasFile('nid_front')) {
            $image = $request->file('nid_front');
            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/merchant/nid_front');
            $image->move($destinationPath, $imagename);
            $validate['nid_front'] = $imagename;
        }
        if ($request->hasFile('nid_back')) {
            $image = $request->file('nid_back');
            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/merchant/nid_back');
            $image->move($destinationPath, $imagename);
            $validate['nid_back'] = $imagename;
        }
        $validate['user_id'] = Auth::user()->id;
        MerchantShop::create($validate);

        return back();
    }

    public function myprofile()
    {
        return view('merchant.my_profile.view');
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