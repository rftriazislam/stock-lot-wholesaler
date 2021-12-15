<?php

namespace App\Http\Controllers\Api\EarnByLearn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Help\Category as HelpCategory;
use App\Help\Helper;
use App\Models\MerchantProduct;

class ProductController extends Controller
{
    public function products()
    {
        $product =  MerchantProduct::select(
            'id',
            'product_name',
            'main_picture',
            'slug',
            'price',
            'size',
            'unit',
            'color',
            'stock',
            'views',
            'mini_order',
            'service_charge',
            'min_retail_price',
            'max_retail_price',
        )
            ->where('status', 2)
            ->latest()
            ->paginate(12);

        $image = array(
            'product_image' => url('/storage/merchant/product/main/small/'),
            'subcategory_image' => url('/public/storage/subcategory/'),
            'category_image' => url('/public/storage/category/small/'),
        );
        if ($product) {
            return response()->json(['success' => true, 'products' => $product, 'image' => $image], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'failed'], 400);
        }
    }
}