<?php

namespace App\Help;

use App\Models\DeliveryDetail;
use App\Models\HotDealProduct;
use App\Models\MerchantProduct;
use App\Models\MerchantShop;
use App\Models\TransanctionHistory;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Http;

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

    public static function  live_video($user_name)
    {

        $response = Http::get('https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/' . $user_name . '/live');
        // $response = Http::get('https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/GAMEWggORLD72621/live');
        $body = $response->body();

        $gcheck = strpos($body, 'Entweder existiert dieses Video nicht mehr oder du bist nicht berechtigt, es dir anzusehen');
        $gcheck_2 = strpos($body, 'Video nicht verf??gbar');
        $gcheck_3 = strpos($body, 'war live');
        $gcheck_4 = strpos($body, 'ist live');

        $echeck = strpos($body, 'This video may no longer exist, or you don' . "'" . 't have permission to view it.');
        $echeck_2 = strpos($body, 'Video unavailable');
        $echeck_3 = strpos($body, 'was live');
        $echeck_4 = strpos($body, 'is live');

        if ($gcheck === false || $echeck === false) {
            if (($gcheck_3 === false && $gcheck_4 !== false) || ($echeck_3 === false && $echeck_4 !== false)) {
                $msg = "false";
            } else {
                $msg = "trufe";
            }
        } else {
            $msg = "true";
        }
        return $msg;
    }
    public static function hotdel()
    {
        date_default_timezone_set("Asia/Dhaka");
        $time = date('Y-m-d H:i:s');

        $hotdeals = HotDealProduct::where('expried_time', '<', $time)->get();

        foreach ($hotdeals as $do) {
            $r = MerchantProduct::where('id', $do->product_id)->first();
            $r->update([
                'hot_product' => 0
            ]);
            HotDealProduct::where('id', $do->id)->delete();
        }
        return true;
    }
}