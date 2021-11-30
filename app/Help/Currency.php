<?php

namespace App\Help;

use App\Models\ExchangeRate;
use App\Models\User;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache as FacadesCache;
use Illuminate\Support\Facades\Http;

class Currency
{
    public static function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }


    public static   function mc($currency, $price)
    {

        $currecny_user = $currency;
        $exchange_user = ExchangeRate::where('rates', $currecny_user)->first();
        $price_user = $price / $exchange_user->money;
        if (Auth::check()) {
            $social = User::select('currency')->where('id', Auth::user()->id)->first();
            $currecny = $social->currency;
        } else {

            $cahe =   FacadesCache::get('data_currency');
            if ($cahe == null || count($cahe) <= 8) {
                $data =   Http::get('https://ipapi.co/' . Currency::getUserIP() . '/json/')->json();
                // $data =   Http::get('https://ipapi.co/' . '220.152.115.222' . '/json/')->json();
                $cahe =   FacadesCache::put('data_currency',   $data);
                $currency_api = FacadesCache::get('data_currency');
                $currecny =   $currency_api['currency'];
            } else {
                $currency_api = FacadesCache::get('data_currency');
                $currecny = $currency_api['currency'];
            }
        }
        $exchange = ExchangeRate::where('rates', $currecny)->first();
        $prc = $price_user * $exchange->money;
        $price_product =  round($prc, 2) . ' ' .     $exchange->rates;
        return $price_product;
    }

    public static   function mcdr2($currency, $price)
    {
        $currecny_user = $currency;
        $exchange_user = ExchangeRate::where('rates', $currecny_user)->first();
        $price_user = $price / $exchange_user->money;
        $social = User::select('currency')->where('id', Auth::user()->id)->first();
        $currecny = $social->currency;
        $exchange = ExchangeRate::where('rates', $currecny)->first();
        $prc = $price_user * $exchange->money;

        $price_product =  round($prc, 2) . ' ' .     $exchange->rates;
        return $price_product;
    }
    public static   function mcd2($currency, $price)
    {
        $currecny_user = $currency;

        $exchange_user = ExchangeRate::where('rates', $currecny_user)->first();
        $price_user = $price / $exchange_user->money;

        $social = User::select('currency')->where('id', Auth::user()->id)->first();
        $currecny = $social->currency;
        $exchange = ExchangeRate::where('rates', $currecny)->first();
        $prc = $price_user * $exchange->money;

        $price_product =  round($prc, 2);
        return $price_product;
    }

    public static   function mc4($currency, $price)
    {
        $currecny_user = $currency;

        $exchange_user = ExchangeRate::where('rates', $currecny_user)->first();
        $price_user = $price / $exchange_user->money;

        $exchange = ExchangeRate::where('rates', 'USD')->first();
        $prc = $price_user * $exchange->money;

        $price_product =  round($prc, 4);
        return $price_product;
    }
}