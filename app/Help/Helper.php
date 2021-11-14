<?php

namespace App\Help;

use App\Models\MerchantShop;

class Helper
{

    public static function shop_info($id)
    {
        $shop = MerchantShop::where('user_id', $id)->first();
        return $shop;
    }
}