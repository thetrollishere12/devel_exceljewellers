<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Models\SoldItem;
use App\Models\CustomerOrder;
use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrder;
use App\Mail\OrderConfirmation;

class StripeController extends Controller
{

    public function stripe_payment(Request $request){

    	

    	set_time_limit(0);

		if (!session('cart') || count(session('cart.shopping_cart')) == 0 || empty(session('cart.shopping_cart')) || !$request->stripeToken) {
			return back()->withErrors(['error','Error Please Retry']);
		}
		
		$description = "";

		foreach (session('cart.shopping_cart') as $key => $item) {

			$description .= $item['sku']." ".$item["name"]." (".$item['default_img'].")";
			
			if (isset($item['stone'])) {

				$description .= " with stone ".$item['stone']['stone_sku']." ".$item['stone']['name']." (".$item['stone']['default_img'].")";

			}

		}

		$description .= "[subtotal=".session('cart.shopping_cart_detail.subtotal').", tax=".session('cart.shopping_cart_detail.estimate_total_tax').", shipping=".session('cart.shopping_cart_detail.shipping_amount').",discount=".session('cart.coupon_code_applied.discount').", total=".session('cart.shopping_cart_detail.total_cost')."]";

		\Stripe\Stripe::setApiKey(env('STRIPE_SK'));

		$token = $request->stripeToken;

		if (empty($request->billing_checkbox) && $request->billing_address_line_1 != null & $request->billing_postal_zipcode != null) {
	
			if (!empty($request->billing_city) && !empty($request->billing_country) && !empty($request->billing_address_line_1) && !empty($request->billing_postal_zipcode) && !empty($request->billing_s_p_r)) {
				
				$billing = [
					'city'=>$request->billing_city,
				 	'country'=>$request->billing_country,
				 	'line1'=>$request->billing_address_line_1,
				 	'line2'=>$request->billing_address_line_2,
				 	'postal_code'=>$request->billing_postal_zipcode,
				 	'state'=>$request->billing_s_p_r,
				];

			}else{
				return redirect()->to('/checkout')->withErrors(['error','Error With Billing Address. Please Retry']);
			}
			
		}elseif($request->billing_checkbox == "on"){

			$billing = [
				'city'=>session('cart.address.city'),
			 	'country'=>session('cart.address.country'),
			 	'line1'=>session('cart.address.address'),
			 	'line2'=>session('cart.address.line2'),
			 	'postal_code'=>session('cart.address.zipcode'),
			 	'state'=>session('cart.address.spr'),
			];

		}else{

			return redirect()->to('/checkout')->withErrors(['error','Error With Billing Option. Please Retry']);
		}

		// if (session('cart.shopping_cart_detail.estimate_total_tax') != null) {

			$customer = customer_create($token,$billing);

		// }else{
		
		// 	return redirect()->to('/checkout')->withErrors(['error','Error Please Retry (Error 701)']);
		// }

		$charge = create_charge(["description"=>$description,"id"=>$customer->id]);

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
			'payment_method'=>'stripe',
			'payment_info'=>$charge
			
		];

		payment_success($data,$order_num);
	
		return redirect('/thankyou')->with(['order_num',$order_num]);

    }



}
