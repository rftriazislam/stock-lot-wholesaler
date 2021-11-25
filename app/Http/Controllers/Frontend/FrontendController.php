<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartAdd;
use App\Models\Category;
use App\Models\DeliveryDetail;
use App\Models\MerchantProduct;
use App\Models\MerchantShop;
use App\Models\HotDealProduct;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class FrontendController extends Controller
{
    public function index()
    {
        $product = Category::withCount('subcategory')->with(['subcategory' => function ($q) {
            $q->select('*')->withCount('merchantproduct')->where('status', 1);
        }])->with(['cateproduct' => function ($q) {
            $q->select('*')->where('status', 2)->latest()->take(10);
        }])->where('status', 1)->get();
        // return $product;
        // exit();
        $hotdeals = HotDealProduct::with('product')->where('status', 1)->get();

        $top_sells = MerchantProduct::orderBy('stock', 'desc')->take(12)->get();

        return view('frontend.main.home', compact('product', 'hotdeals', 'top_sells'));
    }

    public function product_view($id, $slug)
    {

        $single_product = MerchantProduct::where('id', $id)->where('slug', $slug)->where('status', 2)->first();
        if ($single_product) {
            $single_product->update(['views' => $single_product->views + 1,]);
            return view('frontend.product.view', compact('single_product'));
        } else {
            return back();
        }
    }

    public function product_list_subcategory($id)
    {
        $products = MerchantProduct::where('subcategory_id', $id)->where('status', 2)->get();

        if ($products) {

            return view('frontend.product.lists', compact('products'));
        } else {
            $products = 0;
            return view('frontend.product.lists', compact('products'));
        }
    }
    public function product_list_category($id)
    {
        $products = MerchantProduct::where('category_id', $id)->where('status', 2)->get();

        if ($products) {

            return view('frontend.product.lists', compact('products'));
        } else {
            $products = 0;
            return view('frontend.product.lists', compact('products'));
        }
    }

    public function shop_view($id)
    {

        $shop = MerchantShop::with('marchantproduct')->where('user_id', $id)->first();
        if (!$shop) {
            return view('frontend.main.error');
        }
        $sub = Subcategory::where('status', 1)->get();
        $miniproduct = [];
        foreach ($sub as $i) {
            $product = MerchantProduct::where('subcategory_id', $i->id)->where('user_id', $id)->where('status', 2)->count();
            if ($product) {
                $miniproduct[] = array(
                    'sid' => $i->id,
                    'image' => $i->image,
                    'name' => $i->name,
                    'product' => $product
                );
            }
        }

        return view('frontend.shop.view', compact('shop', 'miniproduct'));
    }


    public function cart_page()
    {
        $carts =  CartAdd::with('vendor', 'product')->where('user_id', Auth::user()->id)->get();
        return view('frontend.product.cart', compact('carts'));
    }


    public function cart_checkout()
    {
        $carts =  CartAdd::with('vendor', 'product')->where('user_id', Auth::user()->id)->get();
        if (count($carts) > 0) {
            return view('frontend.product.checkout', compact('carts'));
        } else {
            return back();
        }
    }

    public function payment_message(Request $request)
    {
        $message = $request->message;
        if ($message) {
            return view('frontend.payment.message', compact('message'));
        } else {
            return redirect()->route('error');
        }
    }
    public function error()
    {
        return view('frontend.main.error');
    }
}