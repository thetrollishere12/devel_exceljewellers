<?php

namespace App\Helper;

use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppHelper{

	public static function Conversion($base_currency,$base_number,$foreign_currency){

		if (Session('currency')) {
			$rates = DB::table('currency_rates')->where('base_currency',$base_currency)->where('foreign_currency',$foreign_currency)->value('rate');
			return $base_number*$rates;
		}else{
			$rates = DB::table('currency_rates')->where('base_currency',$base_currency)->where('foreign_currency','CAD')->value('rate');
			return $base_number*$rates;
		}

	}

	public static function apply_promo($code){


			$redeem = DB::table('coupon_promos')->where('coupon_code',$code)->first();

			$subtotal = 0;
			$discount = 0;

			// Belongs to another user
			if ($redeem->coupon_to_user) {
				if ($redeem->coupon_to_user != Auth::id()) {
					$discount = 0;
					return $discount;
				}
			}

			// Expirary Date
			if ($redeem->redeemed_by) {
				if(Carbon::createFromFormat('Y-m-d H:i:s',$redeem->redeemed_by)->isPast()){
					$discount = 0;
					return $discount;
				}
			}

			foreach (session('cart.shopping_cart') as $key => $value) {
				// If specific type if not then its everything in cart
				if ($redeem->required_type) {
					
					if (isset($value[$redeem->required_type])) {
					
						if ($redeem->required_type_name == $value[$redeem->required_type]) {
							$subtotal += $value["cad_price"];
						}

					}else{
						continue;
					}

				}
				// Everything in cart
				else{
					$subtotal += $value["cad_price"];
				}

				// If engagement-ring with stone
	            if (isset($value['stone']['cad_price'])) {
	                $subtotal += $value['stone']['cad_price'];
	            }
			
			}

			if ($redeem->coupon_type === "percent_off") {

            	$percentage = $redeem->percent_off/100;

            	$discount = $subtotal*$percentage;

            }elseif($redeem->coupon_type === "amount_off"){

            	 $discount = $redeem->amount_off;

            }else{
            	$discount=0;
            }	

			if ($redeem->price_minimum) {

				if ($subtotal < $redeem->price_minimum) {
					$discount = 0;
	        	}

			}

			$coupon_code = [
				'coupon_code'=>$redeem->coupon_code,
    			'coupon_type'=>$redeem->coupon_type,
    			'amount_off'=>$redeem->amount_off,
    			'percent_off'=>$redeem->percent_off,
    			'shipping_off'=>$redeem->shipping_off,
    			'minimum'=>$redeem->price_minimum,
    			'discount'=>$discount,
    			'type'=>$redeem->required_type,
    			'type_name'=>$redeem->required_type_name,
    			'expiry_date'=>$redeem->redeemed_by,
			];

			session()->put('cart.coupon_code_applied',$coupon_code);

			return $discount;

	}

	public static function redeem_promo($code){

		$redeem = DB::table('coupon_promos')->where('coupon_code',$code)->value('max_redemptions');

		switch($redeem){

			case "once":
				DB::table('coupon_promos')->where('coupon_code',$code)->delete();
				return "coupon_deleted";
				break;
			default:
				return "coupon_not_deleted";
				break;

		}

	}


}
