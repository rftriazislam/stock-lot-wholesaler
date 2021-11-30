<?php

namespace App\Http\Controllers\Ajax;

use App\Help\Currency;
use App\Help\Helper;
use App\Http\Controllers\Controller;
use App\Models\CartAdd;
use App\Models\Category;
use App\Models\MerchantProduct;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Auth;
use PHPUnit\TextUI\Help;

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
        return true;
    }


    public function sessioncart()
    {
        $cart = session()->get('cart', []);
        $products = CartAdd::where('user_id', Auth::user()->id)->get();
        foreach ($products as $product) {
            $cart[$product->id] = [
                'cart' => $product
            ];
            session()->put('cart', $cart);
        }
        return true;
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
                $msg = 'update';
            } else {
                $cartcheck2 = CartAdd::where('user_id', Auth::user()->id)
                    ->where('product_id', $request->product_id)
                    ->where('color', $request->color)
                    ->where('size', null)
                    ->first();
                if ($cartcheck2) {
                    $cartadd = $cartcheck2->update(['qty' => $cartcheck->qty + $request->qty]);
                    $msg = 'update';
                } else {
                    $cartcheck3 = CartAdd::where('user_id', Auth::user()->id)
                        ->where('product_id', $request->product_id)
                        ->where('color', null)
                        ->where('size',  $request->size)
                        ->first();
                    if ($cartcheck3) {
                        $cartadd = $cartcheck3->update(['qty' => $cartcheck->qty + $request->qty]);
                        $msg = 'update';
                    } else {
                        $vendorcheck = CartAdd::where('user_id', Auth::user()->id)->first();
                        if ($vendorcheck) {
                            if ($product_one->user_id == $vendorcheck->vendor_id) {
                                $cartadd = new CartAdd();
                                $cartadd->product_id = $request->product_id;
                                $cartadd->vendor_id = $product_one->user_id;
                                $cartadd->user_id = Auth::user()->id;
                                $cartadd->qty = $request->qty;
                                $cartadd->size = $request->size;
                                $cartadd->color = $request->color;
                                $cartadd->save();
                                $msg = 'add';
                            } else {
                                $msg = 'different';
                            }
                        } else {
                            $cartadd = new CartAdd();
                            $cartadd->product_id = $request->product_id;
                            $cartadd->vendor_id = $product_one->user_id;
                            $cartadd->user_id = Auth::user()->id;
                            $cartadd->qty = $request->qty;
                            $cartadd->size = $request->size;
                            $cartadd->color = $request->color;
                            $cartadd->save();
                            $msg = 'add';
                        }
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

        $data = array(
            'msg'  => $msg,
        );

        echo json_encode($data);
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
        $this->sessionforget();
        $this->sessioncart();

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
        $this->sessionforget();
        $this->sessioncart();

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
        $total = 0;
        foreach ($carts as $item) {
            $output .= '
                    <tr>
                        <td>
                            <div class="ps-product--cart">
                                <div class="ps-product__thumbnail"><a href="' . route('product.view', [$item->product->id, $item->product->slug]) . '"><img
                                            src="' . asset('storage') . '/merchant/product/main/small/' . $item->product->main_picture . '"
                                            alt=""></a></div>
                                <div class="ps-product__content"><a
                                        href="' . route('product.view', [$item->product->id, $item->product->slug]) . '">' . $item->product->product_name  . '</a>
                                    <br>
                                    <div class="ps-variant ps-variant--color colorr "
                                        style="background:' . $item->color . ';width: 21px; height: 21px;">
                                        <span class="ps-variant__tooltip">' . $item['color']  . '</span>
                                    </div>
                                    <p> Size:' . $item->size  . '</p>
                                    ';
            if ($item->vendor) {
                $output .= '
                                    <p>Sold By:<strong> ' . $item->vendor->name  . '</strong></p>
                                    ';
            }
            $output .= '
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
                        ' . Currency::mc('BDT', round($item->product->price + $item->product->service_charge, 1)) . '
                        </td>

                        <td> ' . Currency::mc('BDT', round($item->qty * round($item->product->price + $item->product->service_charge, 1), 1))  . '
                        </td>
                        <td><a href="#" class="btn btn-danger" onclick="removed(' . $item->id . ')"><i class="icon-cross"></i></a></td>
                    </tr>
             ';

            $total = $total + round($item->qty * round($item->product->price + $item->product->service_charge, 1), 1);
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

        $total_page = '            <div class="ps-block--shopping-total">
       
        <div class="ps-block__content">
        <h3>CashOn(90%) <span>' . Currency::mc('BDT', Helper::percentage($total, 90)) . '</span>
                Delivery
            </h3>
        <br>
            <h3>Advanced(10%)<span>' . Currency::mc('BDT', Helper::percentage($total, 10)) . '</span></h3>
           
           
            <br>
            <br>
            <h3>Total <span>' . Currency::mc('BDT', $total) . '</span></h3>
        </div>
    </div>
    
    <a class="ps-btn ps-btn--fullwidth " style="background: rgb(8 220 211);color: white;"
        href="' . route('cart.checkout') . '">Proceed to checkout</a>';


        $data = array(
            'output'  => $output,
            'total'  => $total_page,

        );

        echo json_encode($data);
    }

    public function total_item(Request $request)
    {

        if (Auth::check()) {
            $item_count = CartAdd::where('user_id', Auth::user()->id)->count();

            $carts =  CartAdd::with('vendor', 'product')->where('user_id', Auth::user()->id)->get();



            $output = ' <div class="ps-cart__items" style="overflow: scroll;height: 300px;">';
            $total = 0;
            foreach ($carts as $item) {
                $output .= '  <div class="ps-product--cart-mobile">
            <div class="ps-product__thumbnail"><a href="' . route('product.view', [$item->product->id, $item->product->slug]) . '"><img
                        src="' . asset('storage') . '/merchant/product/main/small/' . $item->product->main_picture . '"
                        alt=""></a>
            </div>
            <div class="ps-product__content"><a class="ps-product__remove" href="#" onclick="removed(' . $item->id . ')"><i
                        class="icon-cross"></i></a><a href="' . route('product.view', [$item->product->id, $item->product->slug]) . '">' . $item->product->product_name . '</a>
               <p><strong>Sold by:</strong>  ';


                if ($item->vendor) {
                    $item->vendor->name;
                }


                $output .= '<br>size: ' . $item->size . '&nbsp; color : <span style="height:2px;width:2px;background:' . $item->color . ';color:' . $item->color . '">xx</span></p>
                <small>' . $item->qty . ' x ' . Currency::mc('BDT', ($item->product->price + $item->product->service_charge)) . '</small>
            </div>
        </div>';
                $total = $total + round($item->qty * round($item->product->price + $item->product->service_charge, 1), 1);
            }
            $output .= '
    </div>';
            $output .= '
    <div class="ps-cart__footer">
        <h3>Sub Total:<strong>' . Currency::mc('BDT', $total) . '</strong></h3>
        <figure><a class="ps-btn" href="' . route('product.cart') . '">View
                Cart</a><a class="ps-btn" href="' . route('cart.checkout') . '">Checkout</a></figure>
    </div>';
        } else {
            $item_count = 0;
            $output = '';
        }
        $data = array(
            'item'  => $item_count,
            'minicart' => ($item_count == 0) ? ' ' : $output

        );


        echo json_encode($data);
    }

    public function total_item_mobile()
    {

        if (Auth::check()) {
            $item_count = CartAdd::where('user_id', Auth::user()->id)->count();
            $carts =  CartAdd::with('vendor', 'product')->where('user_id', Auth::user()->id)->get();
            $total = 0;
            $output = '<div class="ps-cart__content">';
            foreach ($carts as $item) {

                $output .= '<div class="ps-product--cart-mobile">
                            <div class="ps-product__thumbnail"><a href="' . route('product.view', [$item->product->id, $item->product->slug]) . '"><img
                                 src="'  . asset('storage') . '/merchant/product/main/small/' . $item->product->main_picture . '" alt=""></a>
                            </div>
                            <div class="ps-product__content"><a class="ps-product__remove"  onclick="removed(' . $item->id . ')"><i
                                 class="icon-cross"></i></a><a href="' . route('product.view', [$item->product->id, $item->product->slug]) . '">' . $item->product->product_name . '</a>
                             <p><strong>Sold by:</strong>';
                if ($item->vendor) {
                    $item->vendor->name;
                }
                $output .= '<br>size: ' . $item->size . '&nbsp; color : <span style="height:2px;width:2px;background:' . $item->color . ';color:' . $item->color . '">xx</span></p>
                             <small>' . $item->qty . ' x ' . Currency::mc('BDT', ($item->product->price + $item->product->service_charge)) . '</small>
                           </div>
                    </div>';
                $total = $total + round($item->qty * round($item->product->price + $item->product->service_charge, 1), 1);
            }
            $output .= ' </div>
        <div class="ps-cart__footer">
            <h3>Sub Total:<strong>' . Currency::mc('BDT', $total) . '</strong></h3>
            <figure><a class="ps-btn" href="' . route('product.cart') . '">View Cart</a><a class="ps-btn"
                    href="' . route('cart.checkout') . '">Checkout</a></figure>
        </div>';
        } else {
            $item_count = 0;
            $output = '';
        }
        $data = array(
            'item'  => $item_count,
            'cartmobile' => ($item_count == 0) ? ' ' : $output

        );


        echo json_encode($data);
    }
}