<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function apply_coupon(Request $req){

    	$coupon = DB::table('coupon_promos')->where('coupon_code',$req->coupon_code);

    	if (count($coupon->get()) > 0) {

            // Belongs to another user
            if ($coupon->value('coupon_to_user')) {
                if ($coupon->value('coupon_to_user') != Auth::id()) {
                    return response()->json(['status'=>'error','message'=>'Invalid Code To User'],400);
                }
            }
            // Expirary Date
            if ($coupon->value('redeemed_by')) {
                if(Carbon::createFromFormat('Y-m-d H:i:s',$coupon->value('redeemed_by'))->isPast()){
                    return response()->json(['status'=>'error','message'=>'Promo Code Expired'],400);
                }
            }
            // Already Applied
            if (session('cart.coupon_code_applied.coupon_code') == $req->coupon_code) {
                return response()->json(['status'=>'error','message'=>'Promo Already Applied'],400);
            }

            \App\Helper\AppHelper::apply_promo($coupon->value('coupon_code'));

    		return response()->json(['status'=>'valid','message'=>'Promo Code Applied'],200);

    	}else{
    		return response()->json(['status'=>'error','message'=>'Invalid Promo Code'],400);
    	}

        return response()->json(['status'=>'error','message'=>'Promo Code Error'],400);

    }

    public function remove_coupon(Request $req){

    	session()->forget('cart.coupon_code_applied');

		return response()->json(['status'=>'valid','message'=>'Promo Code Removed'],200);

    }
}