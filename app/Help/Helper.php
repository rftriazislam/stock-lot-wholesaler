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

    public static function discount_percent($p_id, $user_id)
    {
        $products = MerchantProduct::where('id', $p_id)
            ->where('user_id', $user_id)
            ->where('status', 2)
            ->first();
        $tage = (($products->price + $products->service_charge) * 100) / $products->min_retail_price;
        $persentage = round((100 - $tage), 2);
        return $persentage;
    }
}