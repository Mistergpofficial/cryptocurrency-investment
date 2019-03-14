<?php

namespace App\Http\Controllers;

use Composer\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Transaction;
use App\Models\Referral;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;


class UserController extends Controller
{
   public function ind()
   {
       return view('index');
   }

   public function privacy()
   {
       return view('privacypolicy');
   }

    //You can also use this method which works without Curl
  /*  public function bitpayRequest(){

        $config = \Illuminate\Support\Facades\Config::get('bitcoins');
       // $config = Config::get('bitcoins');

        $url = $config['bitpay_url'];
        $apiKey = $config['bitpay_api_key'];

        $btc = URL::to("/")."/notify/bitpay";

        $post = array(
            //  'orderID' =>$orderId,
            //  'price' => $grandTotal,
            'currency' => 'USD',
            'itemDesc' => 'KodeInfo Checkout Invoice',
            'notificationEmail'=>'developers@kodeinfo.com',
            'notificationURL'=>$btc,
            'physical'=>true,
            'fullNotifications'=>true,
        );

        $post = json_encode($post);
        $length = strlen($post);
        $basic_auth = base64_encode($apiKey);

        $context_options = array(
            "http" => array(
                "method" => "POST",
                "header"  => "Content-type: application/json\r\n" .
                    "Content-Length: $length\r\n" .
                    "Authorization: Basic $basic_auth\r\n"
            )
        );

        $context_options["http"]["content"] = $post;
        $context = stream_context_create($context_options);
        $response = file_get_contents($url, false, $context);

        $decodeResponse = json_decode($response);

        if(empty($decodeResponse)){
            Log::alert(Request::all());
            throw new \Exception("Unable to process payment contact customer support");
        }else{
            return $decodeResponse;
        }

    }*/

}
