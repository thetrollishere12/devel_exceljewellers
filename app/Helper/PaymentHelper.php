<?php

use App\Models\SoldItem;
use App\Models\CustomerOrder;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrder;
use App\Mail\OrderConfirmation;

function subtotal(){

    $subtotal = 0;

    if(session('cart.shopping_cart') && !empty(session('cart.shopping_cart'))){

        foreach (session('cart.shopping_cart') as $sku => $details) {

            $subtotal += $details['cad_price'];

            if (isset($details['stone']['price'])) {
                $subtotal += $details['stone']['cad_price'];
            }

        }

    }

    return $subtotal;

}

function global_time(){

    $ip = file_get_contents("http://ipecho.net/plain");
    $url = 'http://ip-api.com/json/'.$ip;
    $tz = file_get_contents($url);
    $tz = json_decode($tz,true)['timezone'];
    return $tz;
}

function customer_order($order_num){

        foreach(session('cart.shopping_cart') as $sku => $item){

            $sold = new SoldItem;
            $sold->order_num = $order_num;
            $sold->user_id = (Auth::id()) ? Auth::id() : 0;
            $sold->item_sku = $item['sku'];
            $sold->img = $item['default_img'];
            $sold->item_style = $item['name'];
            $sold->sold_price = $item['cad_price'];
            $sold->tax = $item['price']*session('cart.shopping_cart_detail.full_tax');
            $sold->size = $item['size'];
            $sold->engraving = $item['engraving'];
            $sold->returns = $item['return'];
            if (isset($item['stone'])) {
                $sold->diamond_id=$item['stone']['stone_sku'];
                $sold->diamond_name=$item['stone']['name'];
                $sold->diamond_shape=$item['stone']['shape'];
                $sold->diamond_price=$item['stone']['cad_price'];
            }
            $sold->save();

            if (isset($item['stone'])){

                $stone = [
                    "diamond_id" =>$item['stone']['stone_id'],
                    "diamond_sku" =>$item['stone']['stone_sku'],
                    "name"=>$item['stone']['name'],
                    "default_img"=>$item['stone']['default_img'],
                    "shape" =>$item['stone']['shape'],
                    "size" =>$item['stone']['size'],
                    "color" =>$item['stone']['color'],
                    "clarity" =>$item['stone']['clarity'],
                    "carat" =>$item['stone']['carat'],
                    "price" =>$item['stone']['cad_price'],
                    "cert_num"=>$item['stone']['cert_num'],
                    "url"=>$item['stone']['url'],
                    "link"=>$item['stone']['link']
                ];

            }else{
                $stone = null;
            }

            $order[] = [
                'order_num'=>$order_num,
                'item_sku'=>$item['sku'],
                'item_name'=>$item['name'],
                'price'=>$item['cad_price'],
                'size'=>$item['size'],
                'brand'=>$item['brand'],
                'engraving'=>$item['engraving'],
                'link'=>$item['link'],
                'img'=>$item['default_img'],
                'stone'=>$stone
            ];

        }

        $cus_ord = new CustomerOrder;
        $cus_ord->user_id = (Auth::id()) ? Auth::id() : 0;
        $cus_ord->order_num = $order_num;
        $cus_ord->total_price = session('cart.shopping_cart_detail.subtotal');
        $cus_ord->shipping_cost = session('cart.shopping_cart_detail.shipping_amount');
        $cus_ord->tax = session('cart.shopping_cart_detail.estimate_total_tax');
        $cus_ord->discount = (session('cart.coupon_code_applied.discount')) ? session('cart.coupon_code_applied.discount') : 0.00;
        $cus_ord->payment_method = "PayPal";
        $cus_ord->contact_name = session('cart.address.contact_name');
        $cus_ord->phone_number = session('cart.address.phone_number');
        $cus_ord->email_address = session('cart.address.email_address');
        $cus_ord->address = session('cart.address.address');
        $cus_ord->unit = session('cart.address.unit');
        $cus_ord->country = session('cart.address.country');
        $cus_ord->spr = session('cart.address.spr');
        $cus_ord->city = session('cart.address.city');
        $cus_ord->zipcode = session('cart.address.zipcode');
        $cus_ord->save();

        return $order;

}

function payment_success($data,$order_num){

    Mail::to('brandonsanghuynh123@gmail.com')->send(new SendOrder($data));
    Mail::to('brandonsanghuynh123@gmail.com')->send(new OrderConfirmation($data));

    if (env('PROJECT_MODE') == "live") {
        Mail::to('sales@exceljewellers.com')->send(new SendOrder($data));
        Mail::to('order@exceljewellers.com')->send(new SendOrder($data));
    }

    Mail::to(session('cart.address.email_address'))->send(new OrderConfirmation($data));

    \App\Helper\AppHelper::redeem_promo(session('cart.coupon_code_applied.coupon_code'));

    // Session::forget('cart');

    session()->put('order_num',$order_num);

}