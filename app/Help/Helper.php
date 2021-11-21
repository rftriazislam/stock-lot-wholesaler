<?php

namespace App\Help;

use App\Models\DeliveryDetail;
use App\Models\MerchantProduct;
use App\Models\MerchantShop;
use App\Models\TransanctionHistory;
use GrahamCampbell\ResultType\Success;

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
        $percentage = round((100 - $tage), 2);
        return $percentage;
    }

    public static function  percentage($price, $percentage)
    {
        $total = round(($price * $percentage) / 100, 1);
        return $total;
    }
    public static function deliveryDetails($id)
    {
        $details = DeliveryDetail::where('user_id', $id)->first();
        return $details;
    }

    public static function transtion_history($id, $amount, $status, $type)
    {

        $trans = new TransanctionHistory();
        $trans->amount = $amount;
        $trans->user_id = $id;
        $trans->pyment_status = $status;
        $trans->payment_type = $type;
        $trans->save();
        return true;
    }


    public static function product($id)
    {
        $product = MerchantProduct::where('id', $id)
            ->first();
        return $product;
    }
}