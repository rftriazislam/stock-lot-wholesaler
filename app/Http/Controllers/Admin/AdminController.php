<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ExchangeRate;
use App\Models\MerchantProduct;
use App\Models\Method;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\HotDealProduct;
use App\Models\PreProduct;
use App\Models\User;
use CreateSlidersTable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Image;
use Auth;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.main.home');
    }
    public function add_category()
    {
        return view('admin.category.create');
    }
    public function save_category(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => 'required|unique:categories,name',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image2 = $request->file('image');

            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/category/big/');
            $destinationPathsmall = public_path('/storage/category/small/');

            $resize_image = Image::make($image);
            $resize_image->resize(654, 295);
            $resize_image->save($destinationPath . $imagename);

            $resize_image_small = Image::make($image2);
            $resize_image_small->resize(170, 170);
            $resize_image_small->save($destinationPathsmall . $imagename);

            // $image->move($destinationPath, $imagename);
            $validate['image'] = $imagename;
        }
        Category::create($validate);
        return back();
    }
    public function list_category()
    {
        $categories = Category::latest()->paginate();
        return view('admin.category.lists', compact('categories'));
    }
    public function delete_category($id)
    {
        $category = Category::where('id', $id)->first();
        if ($category) {
            // $category->delete();
            return back();
        } else {
            return back();
        }
    }


    public function status_category($id)
    {
        $category = Category::where('id', $id)->first();
        if ($category) {
            $category->update([
                'status' => ($category->status == 1) ? '0' : "1"
            ]);
            return back();
        } else {
            return back();
        }
    }
    public function edit_category($id)
    {
        $category = Category::where('id', $id)->first();

        if ($category) {
            return view('admin.category.edit', compact('category'));
        } else {
            return back();
        }
    }
    public function update_category(Request $request)
    {

        $category = Category::where('id', $request->id)->first();
        $category->update($request->all());
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $image2 = $request->file('file');
            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/category/big/');
            $destinationPathsmall = public_path('/storage/category/small/');

            $resize_image = Image::make($image);
            $resize_image->resize(654, 295);
            $resize_image->save($destinationPath . $imagename);

            $resize_image_small = Image::make($image2);
            $resize_image_small->resize(170, 170);
            $resize_image_small->save($destinationPathsmall . $imagename);


            $category->update([
                'image' => $imagename
            ]);
        }

        return redirect()->route('list.category');
    }



    public function add_subcategory()
    {
        return view('admin.subcategory.create');
    }
    public function save_subcategory(Request $request)
    {
        $validate = $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'name' => [
                'required', Rule::unique('subcategories', 'name', 'category_id')
                    ->where('name', $request->name)
                    ->where('category_id', $request->category_id)
            ],
            'image' => 'required|image|mimes:jpg,png,jpeg,webp',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/subcategory/');
            $resize_image = Image::make($image);
            $resize_image->resize(300, 300);
            $resize_image->save($destinationPath . $imagename);
            $validate['image'] = $imagename;
        }
        Subcategory::create($validate);
        return back();
    }
    public function list_subcategory()
    {
        $subcategories = Subcategory::with('category')->latest()->paginate(15);
        return view('admin.subcategory.lists', compact('subcategories'));
    }

    public function delete_subcategory($id)
    {
        $subcategory = Subcategory::where('id', $id)->first();
        if ($subcategory) {
            // $subcategory->delete();
            return back();
        } else {
            return back();
        }
    }


    public function status_subcategory($id)
    {
        $subcategory = Subcategory::where('id', $id)->first();
        if ($subcategory) {
            $subcategory->update([
                'status' => ($subcategory->status == 1) ? '0' : "1"
            ]);
            return back();
        } else {
            return back();
        }
    }
    public function edit_subcategory($id)
    {
        $subcategory = Subcategory::where('id', $id)->first();

        if ($subcategory) {
            return view('admin.subcategory.edit', compact('subcategory'));
        } else {
            return back();
        }
    }
    public function update_subcategory(Request $request)
    {

        $subcategory = Subcategory::where('id', $request->id)->first();
        $subcategory->update($request->all());
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/subcategory/');

            $resize_image = Image::make($image);
            $resize_image->resize(300, 300);
            $resize_image->save($destinationPath . $imagename);
            $subcategory->update([
                'image' => $imagename
            ]);
        }

        return redirect()->route('list.subcategory');
    }

    public function add_method()
    {
        return view('admin.method.create');
    }

    public function save_method(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => 'required|unique:methods,name',
        ]);
        Method::create($validate);
        return  back();
    }


    public function add_slider()
    {
        return view('admin.slider.create');
    }

    public function save_slider(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => 'required|unique:sliders,name',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/slider/');
            $resize_image = Image::make($image);
            $resize_image->resize(2100, 430);
            $resize_image->save($destinationPath . $imagename);
            // $image->move($destinationPath, $imagename);
            $validate['image'] = $imagename;
        }
        Slider::create($validate);
        return back();
    }
    public function list_slider()
    {
        $sliders = Slider::latest()->paginate();
        return view('admin.slider.lists', compact('sliders'));
    }

    public function delete_slider($id)
    {
        $Slider = Slider::where('id', $id)->first();
        if ($Slider) {
            $Slider->delete();
            return back();
        } else {
            return back();
        }
    }


    public function status_slider($id)
    {
        $Slider = Slider::where('id', $id)->first();
        if ($Slider) {
            $Slider->update([
                'status' => ($Slider->status == 1) ? '0' : "1"
            ]);
            return back();
        } else {
            return back();
        }
    }
    public function edit_slider($id)
    {
        $slider = Slider::where('id', $id)->first();

        if ($slider) {
            return view('admin.slider.edit', compact('slider'));
        } else {
            return back();
        }
    }
    public function update_slider(Request $request)
    {

        $category = Slider::where('id', $request->id)->first();
        $category->update($request->all());
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/slider/');
            $resize_image = Image::make($image);
            $resize_image->resize(2100, 430);
            $resize_image->save($destinationPath . $imagename);
            $category->update([
                'image' => $imagename
            ]);
        }

        return redirect()->route('list.slider');
    }

    public function pre_add_product()
    {
        $product_id =   substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJK0123456789LMNOPQRSTUVWXYZ', ceil(7 / strlen($x)))), 1, 7);
        $category = Category::where('status', 1)->get();
        return view('admin.preorder.create', compact('category', 'product_id'));
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
            'delivery_date' => 'required',
            'delivery.*' => 'nullable',
            'service_charge' => 'required',
            'date' => 'required',
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
        if ($request->delivery) {
            $del = [];
            foreach ($request->delivery as $d) {
                if ($d) {
                    $del[] = array('delivery' => $d);
                }
            }
            $validate['delivery'] =  $del;
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

        if ($product_save) {
            $savepreproduct = new PreProduct();
            $savepreproduct->user_id = Auth::user()->id;
            $savepreproduct->product_id =   $product_save->id;
            $savepreproduct->delivery_date = $request->delivery_date;
            $savepreproduct->expried_time = $request->date;
            $savepreproduct->save();
        }

        return back();
    }

    public function pre_product_lists()
    {
        $products = MerchantProduct::with(['category:id,name', 'subcategory:id,name', 'preproduct'])->where('user_id', Auth::user()->id)->where('status', 4)->latest()->paginate();


        return view('admin.preorder.lists', compact('products'));
    }

    public function pre_product_edit($id)
    {
        $product = MerchantProduct::with(['category:id,name', 'subcategory:id,name', 'preproduct'])->where('id', $id)->first();
        $category = Category::where('status', 1)->get();
        if ($product) {
            return view('admin.preorder.view', compact('product', 'category'));
        } else {
            return back();
        }
    }



    public function preproduct_update(Request $request)
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
            if ($request->deliveryy) {
                $del = [];
                foreach ($request->deliveryy as $d) {
                    if ($d) {
                        $del[] = array('delivery' => $d);
                    }
                }

                $product->update(['delivery' => $del]);
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







    //-------------------merchant--------------
    public function list_merchant()
    {
        $merchants = User::where('role', 'merchant')->latest()->get();
        if ($merchants) {
            return view('admin.merchant.lists', compact('merchants'));
        } else {
            return back();
        }
    }

    public function list_merchant_products()
    {
        $products = MerchantProduct::latest()->paginate();
        return view('admin.product.merchant.lists', compact('products'));
    }

    public function status_merchant_product($id)
    {

        $product = MerchantProduct::where('id', $id)->first();
        if ($product) {
            $product->update([
                'status' => ($product->status == 1) ? '2' : "1"
            ]);
            return back();
        } else {
            return back();
        }
    }
    public function hot_addproduct(Request $request, $id)
    {

        $product = MerchantProduct::where('id', $id)->first();
        if ($product) {
            $request['product_id'] = $id;
            $this->validate($request, ['product_id' => 'required|unique:hot_deal_products,product_id']);
            return view('admin.product.merchant.hotproduct', ['id' => $id]);
        } else {
            return back();
        }
    }

    public function merchant_hot_saveproduct(Request $request)
    {

        $product = MerchantProduct::where('id', $request->product_id)->first();
        if ($product) {
            $up = $product->update(['hot_product' => 1]);

            $hot = new HotDealProduct();
            $hot->product_id = $request->product_id;
            $hot->expried_time = $request->date;
            $hot->save();
        }
        return redirect()->route('admin.merchant.products');
    }
    public function hot_removeproduct($id)
    {
        $product = MerchantProduct::where('id', $id)->first();
        if ($product) {
            $up = $product->update(['hot_product' => 0]);
            HotDealProduct::where('product_id', $id)->delete();
        }
        return redirect()->route('admin.merchant.products');
    }

    //-------------------merchant--------------

    //-------------------reseller--------------
    public function list_reseller()
    {
        $resellers = User::where('role', 'reseller')->latest()->get();
        if ($resellers) {
            return view('admin.reseller.lists', compact('resellers'));
        } else {
            return back();
        }
    }
    //-------------------reseller--------------

    public function currency_convert()
    {

        $data = Http::get('https://openexchangerates.org/api/latest.json?app_id=1d198fa2354940eca5d4bb7a85983404')->json();
        $base = $data['base'];
        $rates =   $data['rates'];
        $rat =    count($rates);

        $exchange = ExchangeRate::all();

        $i = 0;
        if ($exchange == '[]' || $exchange == null) {
            foreach ($rates as $key => $value) {
                if ($rat >= $i) {
                    $rates = new ExchangeRate();
                    $rates->base = $base;
                    $rates->rates = $key;
                    $rates->money = $value;
                    $rates->save();
                    $i = $i + 1;
                }
            }
        } else {

            foreach ($rates as $key => $value) {
                if ($rat >= $i) {
                    $rates = ExchangeRate::where('rates', $key)->first();

                    $rates->update([
                        $rates->money = $value,
                    ]);


                    $i = $i + 1;
                }
            }
        }
        return back();
    }
}