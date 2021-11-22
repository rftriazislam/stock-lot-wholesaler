<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MerchantProduct;
use App\Models\Method;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\User;
use CreateSlidersTable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Image;

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
            $category->delete();
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
            $subcategory->delete();
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

}