<?php

namespace App\Help;

use App\Models\Category as ModelsCategory;
use App\Models\HotDealProduct;
use App\Models\MerchantProduct;
use App\Models\Slider;

class Category
{

    public static function category_list()
    {
        $product = ModelsCategory::select('id', 'name', 'image')->where('status', 1)->take(8)->get();
        return $product;
    }

    public static function slider()
    {
        $slider = Slider::select('id', 'image')->where('status', 1)->get();
        return $slider;
    }
    public static function catproduct()
    {
        $products = ModelsCategory::select('id', 'name', 'image')->withCount('subcategory')->with(['subcategory' => function ($q) {
            $q->select('id', 'category_id', 'name', 'image')->withCount('merchantproduct')->where('status', 1);
        }])->with(['cateproduct' => function ($q) {
            $q->select('id', 'slug', 'main_picture', 'user_id', 'category_id', 'product_name', 'price', 'service_charge', 'min_retail_price')->where('status', 2)->latest()->take(12);
        }])->where('status', 1)->get();

        $sproducts = [];

        foreach ($products as  $product) {
            $subcategory = [];
            foreach ($product->subcategory as $subcat) {
                $subcategory[] = array(
                    'id' => $subcat->id,
                    'name' => $subcat->name,
                    'image' => $subcat->image,
                    'merchantproduct' => $subcat->merchantproduct_count,
                );
            }

            $pro = [];
            foreach ($product->cateproduct as $pr) {
                $pro[] = array(
                    'id' => $pr->id,
                    'name' => $pr->product_name,
                    'slug' => $pr->slug,
                    'user_id' => $pr->user_id,
                    'price' => $pr->price,
                    'service_charge' => $pr->service_charge,
                    'total' => Currency::mc('BDT', $pr->price + $pr->service_charge),
                    'min_retail_price' => Currency::mc('BDT', $pr->min_retail_price),
                    'image' => $pr->main_picture,
                );
            }
            $sproducts[] = array(
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'sub_count' => $product->subcategory_count,
                'subcategory' => $subcategory,
                'product' => $pro
            );
        }
        return $products;
    }

    public static function hotdeals()
    {
        $hot = HotDealProduct::with('product:id,user_id,subcategory_id,product_name,slug,main_picture,files,price,service_charge,min_retail_price,sell_count,stock')->where('status', 1)->get();
        return $hot;
    }

    public static function topsell()
    {
        $top =  MerchantProduct::select('id', 'product_name', 'main_picture', 'slug', 'price', 'service_charge')->where('status', 2)->orderBy('stock', 'desc')->take(12)->get();
        return $top;
    }
}