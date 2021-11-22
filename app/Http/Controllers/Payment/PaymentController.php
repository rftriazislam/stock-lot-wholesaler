<?php

namespace App\Http\Controllers\Payment;

use App\Help\Helper;
use App\Http\Controllers\Controller;
use App\Models\CartAdd;
use App\Models\DeliveryDetail;
use App\Models\MerchantOrder;
use App\Models\PaymentTransanctionHistory;
use App\Models\TransanctionHistory;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Auth;

class PaymentController extends Controller
{
    protected $merchant_username;
    protected $merchant_password;
    protected $client_ip;
    protected $merchant_key_prefix;
    protected $tx_id;

    public function __construct()
    {
        $this->merchant_username = "unistag";
        $this->merchant_password = "miDXB57XSwBn";
        $this->client_ip = $this->getUserIP();

        // $this->client_ip = $_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';
        $this->merchant_key_prefix = "UNT";
    }

    public  function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = @$_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }




    public function generateTxId($unique_id = null)
    {
        if ($unique_id) {
            $tx_id = $this->merchant_key_prefix . $unique_id  . uniqid() . 'US';
        } else {
            $tx_id = $this->merchant_key_prefix . uniqid();
        }
        $this->tx_id = $tx_id;
        return $tx_id;
    }




    public function paymentresponse(Request $request)
    {
        $response_encrypted = $request->spdata;
        $response_decrypted = file_get_contents("https://shurjopay.com/merchant/decrypt.php?data=" . $response_encrypted);
        $response_data = simplexml_load_string($response_decrypted) or die("Error: Cannot create object");
        $success_url = $request->get('success_url');

        $tx_id = $response_data->txID;



        $trans_info = PaymentTransanctionHistory::where('tx_id', $tx_id)->first();

        $trans_info->update([
            'transaction_status' => ($response_data->spCode == '000') ? 'Success' : 'Fail'
        ]);

        if ($response_data->spCode == '000') {
            $deliverydetails = DeliveryDetail::where('user_id', $trans_info->buyer_id)->first();
            $merchant_order = new MerchantOrder();
            $merchant_order->tx_id = $trans_info->tx_id;
            $merchant_order->transanction_id = $trans_info->id;
            $merchant_order->buyer_id = $trans_info->buyer_id;
            $merchant_order->vendor_id = $trans_info->vendor_id;
            $merchant_order->order_list = $trans_info->order_list;
            $merchant_order->delivery_details = array($deliverydetails);
            $merchant_order->amount = $trans_info->amount;
            $merchant_order->total_amount = $trans_info->total_amount;
            $merchant_order->total_service_charge = $trans_info->total_service_charge;
            if ($merchant_order->save()) {
                $balance = $trans_info->amount - $trans_info->total_service_charge;
                Helper::vendor_balance($trans_info->vendor_id, $balance);
                Helper::vendor_affiliate($trans_info->vendor_id, $trans_info->total_service_charge);


                // $transtion_history = Helper::transtion_history($trans_info->buyer_id, $trans_info->amount, 'out', 'buy');
                return redirect()->route('payment_message', ['message' => 'success']);
            } else {
                return redirect()->route('payment_message', ['message' => 'success']);
            }
        } else {
            PaymentTransanctionHistory::where('buyer_id', $trans_info->buyer_id)->where('transaction_status', 'init')->delete();
            return redirect()->route('payment_message', ['message' => 'Fail']);
        }
    }


    public function payment_issue(Request $request)
    {

        $message = $request->message;
        return view('payment_issue_app.payment', compact('message'));
    }


    protected function price_convert($price, $product_id, $form_name, $qty, $seller_id)
    {

        if ($form_name == 'make_payment') {

            $user_product = MakePayment::where('id', $product_id)->where('post_id', $seller_id)->first();

            if ($user_product->send_amount >= $qty) {
                $seller_currency = User::where('id', $seller_id)->first();
                $exchange_user = ExchangeRate::where('rates', $user_product->get_currency)->first();
                $price_user = $user_product->unit_price / $exchange_user->money;
                $exchange = ExchangeRate::where('rates', 'BDT')->first();
                $total_price = $price_user * $exchange->money;
                $total_price = $total_price * $qty;
            } else {
                $total_price = 'false';
            }
        } elseif ($form_name == 'gift_card') {
            $user_product = GiftCard::where('id', $product_id)->where('post_id', $seller_id)->first();
            if ($user_product->qty >= $qty) {
                $seller_currency = User::where('id', $seller_id)->first();
                $exchange_user = ExchangeRate::where('rates', $seller_currency->currency)->first();
                $price_user = $user_product->price / $exchange_user->money;
                $exchange = ExchangeRate::where('rates', 'BDT')->first();
                $total_price = $price_user * $exchange->money;
                $total_price = $total_price * $qty;
            } else {
                $total_price = 'false';
            }
        } elseif ($form_name == 'subscription') {
            $user_product = Subscription::where('id', $product_id)->where('post_id', $seller_id)->first();
            if ($user_product->qty >= $qty) {
                $seller_currency = User::where('id', $seller_id)->first();
                $exchange_user = ExchangeRate::where('rates', $seller_currency->currency)->first();
                $price_user = $user_product->price / $exchange_user->money;
                $exchange = ExchangeRate::where('rates', 'BDT')->first();
                $total_price = $price_user * $exchange->money;
                $total_price = $total_price * $qty;
            } else {
                $total_price = 'false';
            }
        } else if ($form_name == 'social_media') {
            $user_product = SocialMedia::where('id', $product_id)->where('post_id', $seller_id)->first();

            if (1 >= $qty) {
                $seller_currency = User::where('id', $seller_id)->first();
                $exchange_user = ExchangeRate::where('rates', $seller_currency->currency)->first();
                $price_user = $user_product->price / $exchange_user->money;
                $exchange = ExchangeRate::where('rates', 'BDT')->first();
                $total_price = $price_user * $exchange->money;
                $total_price = $total_price * $qty;
            } else {
                $total_price = 'false';
            }
        } else if ($form_name == 'influence_marketing') {
            $user_product = InfluenceMarketing::where('id', $product_id)->where('post_id', $seller_id)->first();
            if (1 >= $qty) {
                $seller_currency = User::where('id', $seller_id)->first();
                $exchange_user = ExchangeRate::where('rates', $seller_currency->currency)->first();
                $price_user = $user_product->price / $exchange_user->money;
                $exchange = ExchangeRate::where('rates', 'BDT')->first();
                $total_price = $price_user * $exchange->money;
                $total_price = $total_price * $qty;
            } else {
                $total_price = 'false';
            }
        } else if ($form_name == 'digital_wallet') {
            $user_product = DigitalWallet::where('id', $product_id)->where('post_id', $seller_id)->first();
            if (1 >= $qty) {
                $seller_currency = User::where('id', $seller_id)->first();
                $exchange_user = ExchangeRate::where('rates', $seller_currency->currency)->first();
                $price_user = $user_product->price / $exchange_user->money;
                $exchange = ExchangeRate::where('rates', 'BDT')->first();
                $total_price = $price_user * $exchange->money;
                $total_price = $total_price * $qty;
            } else {
                $total_price = 'false';
            }
        } else if ($form_name == 'advertisement_account') {
            $user_product = AdvertisementAccount::where('id', $product_id)->where('post_id', $seller_id)->first();
            if (1 >= $qty) {
                $seller_currency = User::where('id', $seller_id)->first();
                $exchange_user = ExchangeRate::where('rates', $seller_currency->currency)->first();
                $price_user = $user_product->price / $exchange_user->money;
                $exchange = ExchangeRate::where('rates', 'BDT')->first();
                $total_price = $price_user * $exchange->money;
                $total_price = $total_price * $qty;
            } else {
                $total_price = 'false';
            }
        } else if ($form_name == 'social_media_promotion') {
            $user_product = SocialMediaPromotion::where('id', $product_id)->where('post_id', $seller_id)->first();
            if (1 >= $qty) {
                $seller_currency = User::where('id', $seller_id)->first();
                $exchange_user = ExchangeRate::where('rates', $seller_currency->currency)->first();
                $price_user = $user_product->unit_price / $exchange_user->money;
                $exchange = ExchangeRate::where('rates', 'BDT')->first();
                $total_price = $price_user * $exchange->money;
                $total_price = $total_price * $qty;
            } else {
                $total_price = 'false';
            }
        } else if ($form_name == 'top_up_apps') {
            $user_product = TopUpApps::where('id', $product_id)->where('post_id', $seller_id)->first();
            if (1 >= $qty) {
                $seller_currency = User::where('id', $seller_id)->first();
                $exchange_user = ExchangeRate::where('rates', $seller_currency->currency)->first();
                $price_user = $user_product->unit_price / $exchange_user->money;
                $exchange = ExchangeRate::where('rates', 'BDT')->first();
                $total_price = $price_user * $exchange->money;
                $total_price = $total_price * $qty;
            } else {
                $total_price = 'false';
            }
        } else if ($form_name == 'games_zone') {
            $user_product = GamesZone::where('id', $product_id)->where('post_id', $seller_id)->first();
            if (1 >= $qty) {
                $seller_currency = User::where('id', $seller_id)->first();
                $exchange_user = ExchangeRate::where('rates', $seller_currency->currency)->first();
                $price_user = $user_product->unit_price / $exchange_user->money;
                $exchange = ExchangeRate::where('rates', 'BDT')->first();
                $total_price = $price_user * $exchange->money;
                $total_price = $total_price * $qty;
            } else {
                $total_price = 'false';
            }
        } else {
            $total_price = 'false';
        }


        return  $total_price;
    }


    public function payment(Request $request)
    {
        $carts = CartAdd::with('vendor', 'product')->where('user_id', Auth::user()->id)->get();
        if (!count($carts) > 0) {
            return back();
        }
        $deliverydetails = DeliveryDetail::where('user_id', Auth::user()->id)->first();
        if ($deliverydetails) {
            $deliverydetails->update($request->all());
        } else {
            $validate = $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'state' => 'required',
                'address' => 'required',
                'note' => 'required',
            ]);
            $validate['user_id'] = Auth::user()->id;
            $deliverydetails = DeliveryDetail::create($validate);
        }
        $prc = $request->toris;
        if ($prc == 'false') {
            return back();
        } else {
            $order = [];
            $total = 0;
            $service_charge = 0;
            foreach ($carts as $cart) {
                $order[] = array(
                    'product_id' => $cart->product->id,
                    'vendor_id' => $cart->vendor_id,
                    'product_name' => $cart->product->product_name,
                    'qty' => $cart->qty,
                    'size' => $cart->size,
                    'color' => $cart->color
                );
                $vendor_id = $cart->vendor_id;
                $total = $total + round($cart->qty * round($cart->product->price + $cart->product->service_charge, 1), 1);
                $service_charge = $service_charge + round($cart->qty * $cart->product->service_charge, 1);
            }
            // dd($vendor_id);
            $advance_pay = Helper::percentage($total, 10);
            $price =  round($advance_pay, 2);
            $total_amount = $total;
            $total_service_charge = $service_charge;
            $tx_id = $this->generateTxId(2);
            // $success_route = 'paymentissue' . ',' . $tx_id;
            // $success_route =   route('paymentissue', $tx_id);
            // $p =  $shurjopay_service->sendPayment($price, $success_route);
            $return_url = 'https://stocklot.xyz/api/payment-response';
            $xml_data = 'spdata=
        <?xml version="1.0" encoding="utf-8"?>
<shurjoPay>
    <merchantName>' . $this->merchant_username . '</merchantName>
    <merchantPass>' . $this->merchant_password . '</merchantPass>
    <userIP>' . $this->client_ip . '</userIP>
    <uniqID>' . $this->tx_id . '</uniqID>

    <totalAmount>' . $price . '</totalAmount>
    <paymentOption>shurjopay</paymentOption>
    <returnURL>' . $return_url . '</returnURL>
</shurjoPay>';


$ch = curl_init();
$url = "https://shurjopay.com/sp-data.php";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1); //0 for a get request
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);



$trans_order = new PaymentTransanctionHistory();
$trans_order->buyer_id = Auth::user()->id;
$trans_order->tx_id = $tx_id;
$trans_order->vendor_id = $vendor_id;
$trans_order->order_list = $order;
$trans_order->amount = $price;
$trans_order->total_amount = $total_amount;
$trans_order->total_service_charge = $total_service_charge;
$trans_order->transaction_status = 'init';

if ($trans_order->save()) {
CartAdd::where('user_id', Auth::user()->id)->delete();
session()->forget('cart');
print_r($response);
} else {
return back();
}
}
}
}