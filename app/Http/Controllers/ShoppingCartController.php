<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ShoppingCartController extends Controller
{

    public function cart(){
        return view('shopping-cart.cart');
    }

    public function removeitem(Request $request){
        if($request && $request->ajax()) {
 
            $cart = session()->get('cart.shopping_cart');
            
            if(isset($cart[$request->id])) {

                if (count($cart[$request->id]) > 0) {

                    unset($cart[$request->id]);
                    session()->put('cart.shopping_cart', $cart);

                }else if (count($cart[$request->id]) == 0) {
                    if (count($cart[$request->id]) == 0) {

                        unset($cart[$request->id]);
                        session()->put('cart.shopping_cart', $cart);

                    }else{

                        unset($cart[$request->id]);
                        session()->put('cart.shopping_cart', $cart);

                    }
                }
            }
        }else{
            return redirect('/error');
        }
    }

    public function cartrefresh(Request $request){

        if (session('cart.coupon_code_applied')) {   

            \App\Helper\AppHelper::apply_promo(session('cart.coupon_code_applied.coupon_code'));

        }

        $total = subtotal();

        return view('shopping-cart.shopping-cart',['total'=>$total]);
    }

    public function num(){
        if (session('cart.shopping_cart')) {
            return count(session('cart.shopping_cart'));
          }else{
            return 0;
          }
    }

    public function cart_num(){

        if (session('cart.shopping_cart')) {
            $count = count(session('cart.shopping_cart'));
          }else{
            $count = 0;
          }

        return view('shopping-cart.cart-number',['count'=>$count]);
    }

    public function addcart(Request $request){

        if ($request->ajax()) {
    
            if ($request->type == "engagement-ring") {
                $product = DB::table('engagement_rings')->where('item_sku','=',$request->sku)->first();
                $returns = "No";
            }else if ($request->type == "wedding-band") {
                $product = DB::table('wedding_bands')->where('item_sku','=',$request->sku)->first();
                $returns = "No";
            }else if ($request->type == "fine-jewellery") {
                $product = DB::table('fine_jewelleries')->where('item_sku','=',$request->sku)->first();
                $returns = "Yes";
            }else if ($request->type == "moissanite") {
                $product = DB::table('moissanite')->where('item_sku','=',$request->sku)->first();
            }else if ($request->type == "lab-grown-diamond") {
                $product = DB::table('lab_grown_diamonds')->where('item_sku','=',$request->sku)->first();
            }else if($request->type == "diamonds"){
                $product = DB::table('natural_diamonds')->where('item_sku','=',$request->sku)->first();
            }

            if (!$product) {
                return response()->json(['status'=>'error','message'=>'Product does not exist!'],400);
            }

            $cart = session()->get('cart.shopping_cart');

            if ($request->type == "moissanite") {

                $cart[] = [
                    "type"=>$product->file_type,
                    "shape"=>$product->shape,
                    "sku"=>$request->sku,
                    "id" => $product->id,
                    "default_img"=>$request->img,
                    "name"=>$product->name,
                    "currency"=>$product->currency,
                    "cad_price"=>number_format(\App\Helper\AppHelper::conversion($product->currency,$product->price,'CAD'),2, '.', ''),
                    "price"=>$product->price,
                    "size" => $product->MM,
                    "engraving" =>null,
                    "return"=>"No",
                    "url"=>$request->url,
                    "link"=>null,
                    "brand"=>"Excel Jewellers",
                    "url"=>$request->url
                        
                ];

            }else if($request->type == "lab-grown-diamond" || $request->type == "diamonds"){

                if (!empty(session('cart.shopping_cart'))) {
                    foreach (session('cart.shopping_cart') as $key) {
                        if($request->sku == $key['sku']){
                            return response()->json(['status'=>'error','message'=>'Already In Cart'],400);
                          }
                        if (isset($key['stone'])) {
                            if($request->sku == $key['stone']['stone_sku']) {
                                return response()->json(['status'=>'error','message'=>'Already In Cart'],400);
                            }
                        }
                    }
                }

                $cart[] = [
                    "type"=>$product->file_type,
                    "shape"=>$product->shape,
                    "sku"=>$request->sku,
                    "id" => $product->id,
                    "default_img"=>$product->img_link,
                    "name"=>$product->name,
                    "currency"=>$product->currency,
                    "cad_price"=>number_format(\App\Helper\AppHelper::conversion($product->currency,$product->price,'CAD'),2, '.', ''),
                    "price"=>$product->price,
                    "size" =>$product->width." By ".$product->length,
                    "engraving" =>null,
                    "return"=>"No",
                    "url"=>$request->url,
                    "link"=>$product->item_link,
                    "brand"=>"Excel Jewellers",
                    "url"=>$request->url    
                ];

                if (session('create_ring.stone') !== null) {
                    if ($request->sku == session('create_ring.stone')['stone_sku']) {
                        session()->forget(['create_ring.stone']);
                        session()->put('cart.shopping_cart', $cart);
                        // Removed Stone From Custom Product
                        return response()->json(['status'=>'valid','message'=>'Removed From Custom. Added To Cart','shape'=>$product->shape],200);
                    }
                }

            }else{

                if ($product->sale_price != null) {
                    $price = $product->sale_price;
                }else{
                    $price = $product->price;
                }

                $cart[] = [
                    "type"=>$product->file_type,
                    "style"=>$product->style,
                    "sku"=>$request->sku,
                    "id" => $product->id,
                    "default_img"=>$request->img,
                    "name"=>$product->name,
                    "currency"=>$product->currency,
                    "price"=>$price,
                    "cad_price"=>number_format(\App\Helper\AppHelper::conversion($product->currency, $price,'CAD'),2, '.', ''),
                    "size" => $request->size,
                    "engraving"=>$request->engraving,
                    "return"=>$returns,
                    "url"=>$request->url,
                    "brand"=>$product->brand,
                    "link"=>$product->item_link
                        
                ];
            }

            session()->put('cart.shopping_cart', $cart);

            return response()->json(['status'=>'valid','message'=>'Added To Cart'],200);

        }else{
            return response()->json(['status'=>'error','message'=>'There was an error. Try Again!'],400);
        }
    }

}
