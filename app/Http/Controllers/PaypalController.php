<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoldItem;
use App\Models\CustomerOrder;
use Auth;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrder;
use App\Mail\OrderConfirmation;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PaypalController extends Controller
{

public function process(Request $request){

        $order_num = random_id('I');

        $order = customer_order($order_num);

        $tz = global_time();

        $data = [
            'customer'=>[
                'user'=>Auth::id(),
                'contact_name'=>session('cart.address.contact_name'),
                'phone_number'=>session('cart.address.phone_number'),
                'email'=>session('cart.address.email_address'),
                'address'=>session('cart.address.address'),
                'country'=>session('cart.address.country'),
                'spr'=>session('cart.address.spr'),
                'city'=>session('cart.address.city'),
                'zipcode'=>session('cart.address.zipcode'),
                'subtotal'=>session('cart.shopping_cart_detail.subtotal'),
                'shipping'=>session('cart.shopping_cart_detail.shipping_amount'),
                'tax'=>session('cart.shopping_cart_detail.estimate_total_tax'),
                'discount'=>session('cart.coupon_code_applied.discount'),
                'total'=>session('cart.shopping_cart_detail.total_cost'),
                'time'=>carbon::now($tz)->addDays(30)->format('Y/m/d')
            ],
            'order'=>$order,
            'payment_method'=>'paypal'
        ];

        payment_success($data,$order_num);

    }

}
