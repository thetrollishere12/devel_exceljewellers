<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class CheckoutController extends Controller
{

    public function checkout(Request $request){

        if(session('cart.shopping_cart') && !empty(session('cart.shopping_cart'))){

            $subtotal = subtotal();

            $addresses = DB::table('addresses')->where('user_id','=',Auth::id())->get();

            $json = country_json();

            return view('payment.shipping',['addresses'=>$addresses,'subtotal'=>$subtotal,'i'=>0,'json'=>$json]);

        }else{
            return redirect('shopcart');
        }
    }


public function payment_type(Request $request){

        if(session('cart.shopping_cart') && count(session('cart.shopping_cart')) > 0 && !empty(session('cart.shopping_cart'))){

        $json = country_json();

        $subtotal = subtotal();

        if ($request->pickup && $request->choice_select == "store_pickup" && $request->choice_select != "customer_address") {

            if (!empty($request->shipping_name) && !empty($request->shipping_email_address) && !empty($request->shipping_phone)) {

                $tax = 12;
                $shipping_amount = 0;
                $shipping_location = $request->pickup[0];

                if ($request->pickup[0] == "Excel Jewellers Guildford Mall") {

                    $address = [
                        "contact_name"=>$request->shipping_name,
                        "email_address"=>$request->shipping_email_address,
                        "phone_number"=>$request->shipping_phone,
                        "address"=>"Upper Level, 10355 152 St",
                        "line2"=>"#2203",
                        "unit"=>"#2203",
                        "country"=>"Canada",
                        "country_code"=>"CA",
                        "spr"=>"British Columbia",
                        "city"=>"Surrey",
                        "zipcode"=>"V3R7C1"
                    ];

                }else if($request->pickup[0] == "Excel Jewellers Langley SmartCentre"){

                    $address = [
                        "contact_name"=>$request->shipping_name,
                        "email_address"=>$request->shipping_email_address,
                        "phone_number"=>$request->shipping_phone,
                        "address"=>"20202 66 Ave",
                        "line2"=>"#370",
                        "unit"=>"#370",
                        "country"=>"Canada",
                        "country_code"=>"CA",
                        "spr"=>"British Columbia",
                        "city"=>"Langley City",
                        "zipcode"=>"V2Y1P3",
                    ];

                }

            }else{
                return redirect()->back()->with('error', ['You are missing a field.']);
            }
    
        }else if($request->choice_select && $request->choice_select == "customer_address" && $request->choice_select != "store_pickup" && $request->pickup == null){

            if (!empty($request->shipping_name) && !empty($request->shipping_email_address) && !empty($request->shipping_phone) && !empty($request->shipping_address_line_1) && !empty($request->shipping_country) && !empty($request->shipping_s_p_r) && !empty($request->shipping_city) && !empty($request->shipping_postal_zipcode)) {

                $country = explode('|', $request->shipping_country);

                switch($country[0]){
                    case"Canada":
                        if ($subtotal > env('FREE_SHIPPING_AMOUNT')) {
                             $shipping_amount = 0;
                        }else{
                             $shipping_amount = 19.99;
                        }

                        $tax = DB::table('tax_codes')->where('country','=',$country[0])->where('state_province','=',$request->shipping_s_p_r)->value('tax_rate');
                        break;
                    case"United States":
                        if ($subtotal > env('FREE_SHIPPING_AMOUNT')) {
                             $shipping_amount = 0;
                        }else{
                             $shipping_amount = 24.99;
                        }

                        $tax = 0;
                        break;
                    default:
                         return redirect()->back()->with('error', ['There was an error.']);
                         break;
                }

                $shipping_location = "Ship To Customer Shipping Address";
                $address = [
                    "contact_name"=>$request->shipping_name,
                    "email_address"=>$request->shipping_email_address,
                    "phone_number"=>$request->shipping_phone,
                    "address"=>$request->shipping_address_line_1,
                    "line2"=>$request->shipping_address_line_2,
                    "unit"=>$request->shipping_address_line_2,
                    "country"=>$country[0],
                    "country_code"=>$country[1],
                    "spr"=>$request->shipping_s_p_r,
                    "city"=>$request->shipping_city,
                    "zipcode"=>$request->shipping_postal_zipcode,
                ];

            }else{
                return redirect()->back()->with('error', ['You are missing a field.']);
            }

        }else{
            return redirect()->back()->with('error', ['You are missing a field.']);;
        }

        $discount = 0;

        if (session('cart.coupon_code_applied.discount')) {
            $discount = session('cart.coupon_code_applied.discount');
        }

        $shipping_cost_details=[
            "currency"=>"CAD",
            "subtotal"=>$subtotal,
            "tax_rate"=>$tax,
            "full_tax"=>$tax/100,
            "estimate_total_tax"=>round(($subtotal-$discount+$shipping_amount)*($tax/100),2),
            "shipping_amount"=>$shipping_amount,
            "total_cost"=>round($subtotal-$discount+$shipping_amount+(($subtotal-$discount+$shipping_amount)*($tax/100)),2),
        ];

        session()->put('cart.shipping_location',$shipping_location);
        session()->put('cart.address',$address);
        session()->put('cart.shopping_cart_detail',$shipping_cost_details);

        if ($subtotal != 0) {

           return view('payment.billing',['subtotal'=>$subtotal,'i'=>0,'json'=>$json]);

        }else{

            return redirect()->back()->with('error', ['There was an error. Error Code(A12)']);

        }

        }else{

            return redirect()->back()->with('error', ['There was an error. Error Code(A17)']);

        }
    
        
    }


    public function thankyou(Request $request){

        if(session('order_num')) {

                 $order = DB::table('customer_orders')->where('order_num',session('order_num'))->limit(1)->get();
                return view('payment.thankyou')->with(['thankyou'=>"Thank You For Shopping With Us"]);

        }else{
            return redirect('/');
        }

    }


}
