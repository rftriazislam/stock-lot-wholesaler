<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\CartAdd;
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
    public function sessionforget()
    {
        session()->forget('cart');
    }


    public function sessioncart()
    {
        $products = CartAdd::where('user_id', Auth::user()->id)->get();
        foreach ($products as $product) {
            $cart[$product->id] = [
                'cart' => $product
            ];
            session()->put('cart', $cart);
        }
    }
    public function add_to_cart(Request $request)
    {
        $product_one = MerchantProduct::where('id', $request->product_id)->first();

        if ($product_one) {
            $cartcheck = CartAdd::where('user_id', Auth::user()->id)
                ->where('product_id', $request->product_id)
                ->where('color', $request->color)
                ->where('size', $request->size)
                ->first();

            if ($cartcheck) {
                $cartadd = $cartcheck->update(['qty' => $cartcheck->qty + $request->qty]);
            } else {
                $cartcheck2 = CartAdd::where('user_id', Auth::user()->id)
                    ->where('product_id', $request->product_id)
                    ->where('color', $request->color)
                    ->where('size', null)
                    ->first();
                if ($cartcheck2) {
                    $cartadd = $cartcheck2->update(['qty' => $cartcheck->qty + $request->qty]);
                } else {
                    $cartcheck3 = CartAdd::where('user_id', Auth::user()->id)
                        ->where('product_id', $request->product_id)
                        ->where('color', null)
                        ->where('size',  $request->size)
                        ->first();
                    if ($cartcheck3) {
                        $cartadd = $cartcheck3->update(['qty' => $cartcheck->qty + $request->qty]);
                    } else {
                        $cartadd = new CartAdd();
                        $cartadd->product_id = $request->product_id;
                        $cartadd->vendor_id = $product_one->user_id;
                        $cartadd->user_id = Auth::user()->id;
                        $cartadd->qty = $request->qty;
                        $cartadd->size = $request->size;
                        $cartadd->color = $request->color;
                        $cartadd->save();
                    }
                }
            }
            session()->forget('cart');
        }

        $cart = session()->get('cart', []);

        $products = CartAdd::where('user_id', Auth::user()->id)->get();
        foreach ($products as $product) {
            $cart[$product->id] = [
                'cart' => $product
            ];
            session()->put('cart', $cart);
        }


        $cart =  session()->get('cart');
        return response()->json($cart);
    }

    public function cart_update(Request $request)
    {
        if ($request->id && $request->qty) {
            $cart = CartAdd::where('user_id', Auth::user()->id)->where('id', $request->id)->first();
            if ($cart) {
                $cart->update(['qty' => $request->qty]);
            }
        }

        $data = array(
            'message'  => true,
        );
        // $this->sessionforget()
        // $this->sessioncart();

        echo json_encode($data);
    }
    public function removed_cart(Request $request)
    {
        $cart = CartAdd::where('user_id', Auth::user()->id)->where('id', $request->id)->first();
        if ($cart) {
            $cart->delete();
        }
        $data = array(
            'message'  => true,
        );
        // $this->sessionforget()
        // $this->sessioncart();

        echo json_encode($data);
    }




    public function show_cart(Request $request)
    {
        if ($request->id && $request->qty) {
            $cart = CartAdd::where('user_id', Auth::user()->id)->where('id', $request->id)->first();
            if ($cart) {
                $cart->update(['qty' => $request->qty]);
            }
        }
        $carts =  CartAdd::with('vendor', 'product')->where('user_id', Auth::user()->id)->get();
        $output = '<div class="table-responsive">
        <table class="table ps-table--shopping-cart">
            <thead>
                <tr>
                    <th>Product Info</th>
                    <th>QUANTITY</th>
                    <th>Unit Price</th>
                    <th>TOTAL</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';
        foreach ($carts as $item) {
            $output .= '
                    <tr>
                        <td>
                            <div class="ps-product--cart">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="' . asset('storage') . '/merchant/product/main/small/' . $item->product->main_picture . '"
                                            alt=""></a></div>
                                <div class="ps-product__content"><a
                                        href="product-default.html">' . $item->product->product_name  . '</a>
                                    <br>
                                    <div class="ps-variant ps-variant--color colorr "
                                        style="background:' . $item->color . ';width: 21px; height: 21px;">
                                        <span class="ps-variant__tooltip">' . $item['color']  . '</span>
                                    </div>
                                    <p> Size:' . $item->size  . '</p>

                                    <p>Sold By:<strong> ' . $item->vendor->name  . '</strong></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group--number">


                                <button class="up plus" onclick="plus(' . $item->id . ')" ><i
                                        class="fa fa-plus"></i></button>
                                <button class="down" onclick="minus(' . $item->id . ')"><i
                                        class="fa fa-minus"></i></button>
                                        <input type="hidden" id="pd_id' . $item->id . '" value="' . $item->id . '">
                                <input class="form-control" type="number" readonly id="price' . $item->id . '"
                                    min="' . $item->product->mini_order  . '"
                                    max="' . $item->product->stock  . '" placeholder="1"
                                    value="' . $item->qty . '">
                            </div>
                        </td>
                        <td class="price">
                        ' . round($item->product->price + $item->product->service_charge, 1)  . '
                        </td>

                        <td> ' . round($item->qty * round($item->product->price + $item->product->service_charge, 1), 1)  . '
                        </td>
                        <td><a href="#" class="btn btn-danger" onclick="removed(' . $item->id . ')"><i class="icon-cross"></i></a></td>
                    </tr>
             ';
        }
        $output .= '

            </tbody>
        </table>
    </div>
    <div class="ps-section__cart-actions"><a class="ps-btn" href="' . route('home') . '"><i
                class="icon-arrow-left"></i> Back to Shop</a>
          
        </div>';

        //  <a class="ps-btn ps-btn--outline"
        //     href="shop-default.html"><i class="icon-sync"></i>Payment</a> 

        $data = array(
            'output'  => $output,
        );

        echo json_encode($data);
    }
}