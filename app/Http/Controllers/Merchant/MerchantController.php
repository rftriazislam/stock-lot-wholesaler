<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MerchantProduct;
use App\Models\MerchantShop;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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

    public function add_product()
    {

        $product_id =   substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJK0123456789LMNOPQRSTUVWXYZ', ceil(7 / strlen($x)))), 1, 7);
        $category = Category::where('status', 1)->get();
        return view('merchant.product.create', compact('category', 'product_id'));
    }
    public function save_product(Request $request)
    {
        $validate = $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'product_name' => 'required',
            'product_id' => 'required',
            'description' => 'required',
            'size' => 'required',
            'unit' => 'required',
            'color.*' => 'required',
            'stock' => 'required',
            'mini_order' => 'required',
            'order_note' => 'nullable',
            'price' => 'required',
            'files.*' => 'required|image|mimes:jpeg,jpg,png',
            'video_link' => 'nullable',
            'status' => 'required',
            'service_charge' => 'required'

        ]);

        if ($files = $request->file('files')) {
            $count = 0;
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $count = $count + 1;
                $imagename = Auth::user()->id . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/storage/merchant/product/');
                $file->move($destinationPath, $imagename);
                $images[] = array(
                    'id' => $count,
                    'extension' => $extension,
                    'image' => $imagename
                );


                // }
            }
            $validate['files'] =  $images;
        }
        foreach ($request->color as $c) {
            $col[] = array('color' => $c);
        }
        $validate['color'] =  $col;
        // dd($validate);
        $validate['user_id'] = Auth::user()->id;


        $product_save = MerchantProduct::create($validate);

        return back();
    }

    public function list_product()
    {
        $products = MerchantProduct::with(['category:id,name', 'subcategory:id,name'])->where('user_id', Auth::user()->id)->latest()->paginate();
        return view('merchant.product.lists', compact('products'));
    }

    public function status_product($id)
    {

        $product = MerchantProduct::where('id', $id)->first();
        if ($product) {
            $product->update([
                'status' => ($product->status == 1) ? '0' : "1"
            ]);
            return back();
        } else {
            return back();
        }
    }


    public function delete_product($id)
    {
        $product = MerchantProduct::where('id', $id)->first();
        if ($product) {
            $product->delete();
            return back();
        } else {
            return back();
        }
    }

    public function edit_product($id)
    {
        $product = MerchantProduct::with(['category:id,name', 'subcategory:id,name'])->where('id', $id)->first();
        $category = Category::where('status', 1)->get();
        if ($product) {
            return view('merchant.product.view', compact('product', 'category'));
        } else {
            return back();
        }
    }

    public function payment_method_add()
    {
        return view('merchant.payment.create');
    }

    public function save_payment_method(Request $request)
    {


        $validate = $this->validate($request, [
            'name' => 'required',
            'account_number' => 'required',
        ]);
        $validate['user_id'] = Auth::user()->id;
        PaymentMethod::create($validate);
        return  back();
    }

    public function list_payment_method()
    {
        $payments =  PaymentMethod::where('user_id', Auth::user()->id)->get();

        return view('merchant.payment.lists', compact('payments'));
    }

    public function merchant_withdraw_add()
    {
        return view('merchant.withdraw.create');
    }
    public function save_withdraw(Request $request)
    {


        $validate = $this->validate($request, [
            'name' => 'required',
            'account_number' => 'required',
            'amount' => 'required'
        ]);
        $validate['user_id'] = Auth::user()->id;
        // if ($request->amount <= Auth::user()->balance) {
        Withdraw::create($validate);
        // }
        return  back();
    }

    public function list_withdraw()
    {
        $withdraws =  Withdraw::where('user_id', Auth::user()->id)->get();

        return view('merchant.withdraw.lists', compact('withdraws'));
    }
}