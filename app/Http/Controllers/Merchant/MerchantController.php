<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MerchantOrder;
use App\Models\MerchantProduct;
use App\Models\MerchantShop;
use App\Models\PaymentMethod;
use App\Models\ShippingDetail;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Image;

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
            'size.*' => 'nullable',
            'unit' => 'required',
            'color.*' => 'nullable',
            'stock' => 'required',
            'mini_order' => 'required',
            'order_note' => 'nullable',
            'price' => 'required',
            'min_retail_price' => 'required',
            'max_retail_price' => 'required',
            'files.*' => 'nullable|image|mimes:jpeg,jpg,png,webp',
            'video_link' => 'nullable',
            'main_picture' => 'required|image|mimes:jpeg,jpg,png,webp',
            'status' => 'required',
            'service_charge' => 'required',
        ]);


        if ($files = $request->file('files')) {
            $count = 0;
            $images = [];
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $image1 = $file;
                $image2 = $file;
                $count = $count + 1;
                $imagename0 = uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath0 = public_path('/storage/merchant/product/files/big/');
                $destinationPath01 = public_path('/storage/merchant/product/files/small/');

                $file_resize = Image::make($image1);
                $file_resize->resize(1100, 1100);
                $file_resize->save($destinationPath0 . $imagename0);

                $file_resize1 = Image::make($image2);
                $file_resize1->resize(446, 514);
                $file_resize1->save($destinationPath01 . $imagename0);
                // $file->move($destinationPath, $imagename);

                $images[] = array(
                    'id' => $count,
                    'extension' => $extension,
                    'image' => $imagename0
                );
                // }
            }
            $validate['files'] =  $images;
        }
        if ($request->file('main_picture')) {
            $image = $request->file('main_picture');
            $image2 = $request->file('main_picture');
            $image3 = $request->file('main_picture');
            $imagename =  str_replace(' ', '-', $request->product_id) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/merchant/product/main/big/');
            $destinationPath_2 = public_path('/storage/merchant/product/main/small/');
            $destinationPath_3 = public_path('/storage/merchant/product/main/medium/');


            $resize_image = Image::make($image);
            $resize_image->resize(1200, 1200);
            $resize_image->save($destinationPath . $imagename);

            $resize_image2 = Image::make($image2);
            $resize_image2->resize(300, 300);
            $resize_image2->save($destinationPath_2 . $imagename);

            $resize_image3 = Image::make($image3);
            $resize_image3->resize(446, 514);
            $resize_image3->save($destinationPath_3 . $imagename);

            $validate['main_picture'] = $imagename;
        }
        if ($request->color) {
            $col = [];
            foreach ($request->color as $c) {
                if ($c && $c != '#5367ce') {
                    $col[] = array('color' => $c);
                }
            }
            $validate['color'] =  $col;
        }


        if ($request->size) {
            $size = [];
            foreach ($request->size as $s) {
                if ($s) {
                    $size[] = array('size' => $s);
                }
            }
            $validate['size'] =  $size;
        }
        // dd($validate);
        $validate['user_id'] = Auth::user()->id;
        $validate['slug'] =  str_replace(' ', '-', $request->product_name);

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

    public function update_product(Request $request)
    {

        // oldfiles

        $product_id = $request->p_id;
        $product = MerchantProduct::where('id', $product_id)->first();

        if ($product) {
            $product->update($request->all());

            if ($request->colorr) {
                $col = [];
                foreach ($request->colorr as $c) {
                    if ($c && $c != '#5367ce') {
                        $col[] = array('color' => $c);
                    }
                }
                $product->update(['color' => $col]);
            }
            if ($request->sizee) {
                $size = [];
                foreach ($request->sizee as $s) {
                    if ($s) {
                        $size[] = array('size' => $s);
                    }
                }
                $product->update(['size' => $size]);
            }

            if ($request->file('main_picturee')) {
                $image = $request->file('main_picturee');
                $image2 = $request->file('main_picturee');
                $image3 = $request->file('main_picturee');
                $imagename =  str_replace(' ', '-', $request->product_id) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/storage/merchant/product/main/big/');
                $destinationPath_2 = public_path('/storage/merchant/product/main/small/');
                $destinationPath_3 = public_path('/storage/merchant/product/main/medium/');
                $resize_image = Image::make($image);
                $resize_image->resize(1200, 1200);
                $resize_image->save($destinationPath . $imagename);

                $resize_image2 = Image::make($image2);
                $resize_image2->resize(300, 300);
                $resize_image2->save($destinationPath_2 . $imagename);

                $resize_image3 = Image::make($image3);
                $resize_image3->resize(446, 514);
                $resize_image3->save($destinationPath_3 . $imagename);

                $product->update(['main_picture' => $imagename]);
            }


            if ($files = $request->file('filess')) {
                $count = 0;
                $images = [];
                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $image1 = $file;
                    $image2 = $file;
                    $count = $count + 1;
                    $imagename0 = uniqid() . '.' . $file->getClientOriginalExtension();

                    $destinationPath0 = public_path('/storage/merchant/product/files/big/');
                    $destinationPath01 = public_path('/storage/merchant/product/files/small/');

                    $file_resize = Image::make($image1);
                    $file_resize->resize(1100, 1100);
                    $file_resize->save($destinationPath0 . $imagename0);

                    $file_resize1 = Image::make($image2);
                    $file_resize1->resize(446, 514);
                    $file_resize1->save($destinationPath01 . $imagename0);
                    // $file->move($destinationPath, $imagename);
                    $images[] = array(
                        'id' => $count,
                        'extension' => $extension,
                        'image' => $imagename0
                    );
                    // }
                }
                $images;

                $imagesss = [];
                if ($request->oldfiles) {
                    foreach ($request->oldfiles  as $i) {
                        foreach ($product->files  as $j) {
                            if ($j['image'] == $i) {
                                $imagesss[] = array(
                                    'id' => $j['id'],
                                    'extension' => $j['extension'],
                                    'image' => $j['image']
                                );
                            }
                        }
                    }

                    $output = array_merge($images, $imagesss);
                } else {
                    $output = $images;
                }
            } else {
                $imagesss = [];
                if ($request->oldfiles) {
                    foreach ($request->oldfiles  as $i) {
                        foreach ($product->files  as $j) {
                            if ($j['image'] == $i) {
                                $imagesss[] = array(
                                    'id' => $j['id'],
                                    'extension' => $j['extension'],
                                    'image' => $j['image']
                                );
                            }
                        }
                    }

                    $output =  $imagesss;
                } else {
                    $output = $product->files;
                }
            }

            $product->update(['files' => $output]);
        }

        return back();
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

    public function order_list()
    {
        $orders =  MerchantOrder::where('vendor_id', Auth::user()->id)->latest()->paginate(10);

        return view('merchant.order.lists', compact('orders'));
    }
    public function order_single($id)
    {
        $order =  MerchantOrder::with('ship_details')->where('vendor_id', Auth::user()->id)->where('id', $id)->first();
        if ($order) {
            return view('merchant.order.products', compact('order'));
        } else {
            return back();
        }
    }

    public function order_shipping_charge($id)
    {

        $order =  MerchantOrder::with('ship_details')->where('vendor_id', Auth::user()->id)->where('id', $id)->first();
        if ($order && $order->ship_details == null) {
            return view('merchant.order.shipping', compact('order'));
        } else {
            return back();
        }
    }

    public function save_shipping(Request $request)
    {
        $validate = $this->validate($request, [
            'order_id' => 'required|exists:merchant_orders,id',
            'ship_to' => 'required|unique:shipping_details,order_id',
            'ship_from' => 'required',
            'ship_cost' => 'required',
            'ship_media_way' => 'required',
            'ship_delay' => 'required',
            'details' => 'required',
        ]);

        $save = ShippingDetail::create($validate);
        if ($save) {
            $order =  MerchantOrder::where('id', $request->order_id)->first();
            $order->update(['status' => 1]);
            return redirect()->route('merchant.income.order');
        } else {
            return back();
        }
    }

    public function order_complete($id)
    {
        $order =  MerchantOrder::where('vendor_id', Auth::user()->id)->where('id', $id)->first();
        if ($order) {
            $order->update(['status' => 2]);
            return redirect()->route('merchant.income.order');
        } else {
            return back();
        }
    }
    public function buy_order_lists()
    {
        $orders = MerchantOrder::where('buyer_id', Auth::user()->id)->latest()->paginate(10);
        return view('merchant.orderbuy.lists', compact('orders'));
    }

    public function buy_order_single($id)
    {
        $order =  MerchantOrder::with('ship_details')->where('buyer_id', Auth::user()->id)->where('id', $id)->first();
        if ($order) {
            return view('merchant.orderbuy.products', compact('order'));
        } else {
            return back();
        }
    }
    public function buy_order_complete($id)
    {
        $order =  MerchantOrder::where('buyer_id', Auth::user()->id)->where('id', $id)->first();
        if ($order) {
            $order->update(['status' => 3]);
            return redirect()->route('merchant.orderbuy.list');
        } else {
            return back();
        }
    }

    public function affiliate()
    {
        $affiliate = url('pro-rft-') . 'link-' . Auth::user()->id . '?' . 'happy-affiliate';
        return view('merchant.main.affiliate', compact('affiliate'));
    }

    public function affiliate_member()
    {

        $members = User::where('refered_id', Auth::user()->id)->get();

        return view('merchant.main.my_member', compact('members'));
    }
}