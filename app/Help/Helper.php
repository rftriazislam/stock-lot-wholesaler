<?php

namespace App\Help;

use App\Models\MerchantProduct;
use App\Models\MerchantShop;

class Helper
{

    public static function shop_info($id)
    {
        $shop = MerchantShop::where('user_id', $id)->first();
        return $shop;
    }

    public static function product_sub_count($id)
    {
        $mer = MerchantProduct::where('subcategory_id', $id)->where('status', 2)->count();
        return $mer;
    }

    public static function subcategory_related($id)
    {
        $products = MerchantProduct::where('subcategory_id', $id)
            ->where('status', 2)
            ->latest()
            ->take(20)
            ->get();
        return $products;
    }
}