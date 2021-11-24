<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use App\Models\MerchantOrder;
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

    public function order_lists()
    {
        $orders = MerchantOrder::where('buyer_id', Auth::user()->id)->latest()->paginate(10);
        return view('reseller.order.lists', compact('orders'));
    }

    public function order_single($id)
    {
        $order =  MerchantOrder::with('ship_details')->where('buyer_id', Auth::user()->id)->where('id', $id)->first();
        if ($order) {
            return view('reseller.order.products', compact('order'));
        } else {
            return back();
        }
    }
    public function order_complete($id)
    {
        $order =  MerchantOrder::where('buyer_id', Auth::user()->id)->where('id', $id)->first();
        if ($order) {
            $order->update(['status' => 3]);
            return redirect()->route('reseller.order.list');
        } else {
            return back();
        }
    }

    public function affiliate()
    {
        $affiliate = url('pro-rft-') . 'link-' . Auth::user()->id . '?' . 'happy-affiliate';
        return view('reseller.main.affiliate', compact('affiliate'));
    }
    public function affiliate_member()
    {

        $members = User::where('refered_id', Auth::user()->id)->get();

        return view('reseller.main.my_member', compact('members'));
    }
}