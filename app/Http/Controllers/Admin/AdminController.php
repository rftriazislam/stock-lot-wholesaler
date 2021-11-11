<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MerchantProduct;
use App\Models\Method;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;

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
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/category/');
            $image->move($destinationPath, $imagename);
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
            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/category/');
            $image->move($destinationPath, $imagename);
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
            'name' => 'required|unique:subcategories,name',
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename =  str_replace(' ', '-', $request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/subcategory/');
            $image->move($destinationPath, $imagename);
            $validate['image'] = $imagename;
        }
        Subcategory::create($validate);
        return back();
    }
    public function list_subcategory()
    {
        $subcategories = Subcategory::with('category')->latest()->paginate();
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
            $image->move($destinationPath, $imagename);
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