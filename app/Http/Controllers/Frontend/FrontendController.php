<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MerchantProduct;
use Illuminate\Http\Request;

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
        return view('frontend.main.home', compact('product'));
    }

    public function product_view($id, $slug)
    {

        $single_product = MerchantProduct::where('id', $id)->where('slug', $slug)->where('status', 2)->first();
        if ($single_product) {
            return view('frontend.product.view', compact('single_product'));
        } else {
            return back();
        }
    }
}