<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

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

        $cart = session()->get('cart', []);


        $cart[$request->product_id] = [
            "id" => $request->product_id,
            "quantity" => $request->qty,
            "details" => array(
                'color' => $request->color,
                'size' => $request->size,
            ),
        ];






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
        $cartt =  session()->get('cart');
        return response()->json($cartt);
    }
}