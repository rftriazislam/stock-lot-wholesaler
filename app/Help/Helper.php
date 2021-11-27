<?php

namespace App\Help;

use App\Models\DeliveryDetail;
use App\Models\MerchantProduct;
use App\Models\MerchantShop;
use App\Models\TransanctionHistory;
use App\Models\User;
use GrahamCampbell\ResultType\Success;

class Helper
{

    public static function shop_info($id)
    {
        $shop = MerchantShop::where('user_id', $id)->first();
        return $shop;
    }

    public static function user_check($id)
    {
        $p =  User::where('id', $id)->where('role', 'merchant')->first();
        if ($p) {
            return  true;
        } else {
            return  false;
        }
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
            ->orWhere('status', 4)
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
    public static function vendor_balance($id, $amount)
    {
        $user = User::where('id', $id)->first();
        $user->update(['balance' => $user->balance + $amount]);
        Helper::transtion_history($id, $amount, 'in', 'sell');
        return true;
    }
    public static function vendor_affiliate($id, $amount)
    {
        $user = User::where('id', $id)->first();
        $comission = ($amount * 20) / 100;
        if ($user->refered_id) {
            $userr = User::where('id', $user->refered_id)->first();
            $userr->update(['balance' => $userr->balance + $comission]);
            Helper::transtion_history($user->refered_id, $comission, 'in', 'Affiliate');
        }

        return true;
    }
    public function productsell($order_list)
    {

        foreach ($order_list as $item) {
            $product = MerchantProduct::where('id', $item['product_id'])->first();
            $product->update([
                'stock' => $product->stock - $item['qty'],
                'sell_count' => $product->sell_count + $item['qty'],
            ]);
        }
        return true;
    }
}