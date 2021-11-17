<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MerchantProduct;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Auth;

class AjaxController extends Controller
{
    public function subcategory_list(Request $request)
    {
        $subcategory = Subcategory::where("category_id", $request->category_id)->where('status', 1)
            ->pluck("name", "id");
        return response()->json($subcategory);
    }

    public function add_to_cart(Request $request)
    {

        $product_one = MerchantProduct::where('id', $request->product_id)->first();

        // $product = session()->forget('cart')->first();
        // exit();
        $cart = session()->get('cart', []);

        $cart =  session()->get('cart');
        $uid = uniqid();
        if (empty($cart)) {
            $cart[$uid] = [
                'uid' => $uid,
                "product_id" => $request->product_id,
                'seller_id' => '1',
                "vendor_id" => $product_one->user_id,
                "quantity" => $request->qty,
                'color' => $request->color,
                'size' => $request->size,
            ];
        } else {
            foreach ($cart as $p) {
                if ($p['product_id'] == $request->product_id) {
                    if ($request->color) {
                        if ($p['color'] = $request->color) {
                            $cart[$p['uid']] = [
                                'uid' => $p['uid'],
                                "product_id" => $p['product_id'],
                                'seller_id' => '1',
                                "vendor_id" => $p['vendor_id'],
                                "quantity" => $p['quantity'] + $request->qty,
                                'color' => $p['color'],
                                'size' => $p['size'],
                            ];
                        } else {
                            $cart[$uid] = [
                                'uid' => $uid,
                                "product_id" => $request->product_id,
                                'seller_id' => '1',
                                "vendor_id" => $product_one->user_id,
                                "quantity" => $request->qty,
                                'color' => $request->color,
                                'size' => $request->size,
                            ];
                        }
                    } else {

                        $cart[$p['uid']] = [
                            'uid' => $p['uid'],
                            "product_id" => $p['product_id'],
                            'seller_id' => '1',
                            "vendor_id" => $p['vendor_id'],
                            "quantity" => $p['quantity'] + $request->qty,
                            'color' => $p['color'],
                            'size' => $p['size'],
                        ];
                    }
                } else {
                    $cart[$uid] = [
                        'uid' => $uid,
                        "product_id" => $request->product_id,
                        'seller_id' => '1',
                        "vendor_id" => $product_one->user_id,
                        "quantity" => $request->qty,
                        'color' => $request->color,
                        'size' => $request->size,
                    ];
                }
            }
        }




        // if(isset($cart[$id])) {
        //     $cart[$id]['quantity']++;
        // } else {
        //     $cart[$id] = [
        //         "name" => $product->name,
        //         "quantity" => 1,
        //         "price" => $product->price,
        //         "image" => $product->image
        //     ];
        // }

        session()->put('cart', $cart);
        $cart =  session()->get('cart');
        return response()->json($cart);
    }
}