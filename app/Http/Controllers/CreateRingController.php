<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Helper\AppHelper;

class CreateRingController extends Controller
{

    public function refresh_custom_bar(){
        return view('components.create-product-stage',['stage'=>'stone']);
    }

    public function refresh_stone_popup(Request $request){
        return view('components.popup-custom-stone',['shape'=>$request->shape]);
    }

    public function addsetting(Request $request){

        if ($request->ajax()) {

            if ($request->type == "engagement-ring") {
                
                if (!$request->size) {
                    return response()->json(['status'=>'error','message'=>'Please Select Ring Size'],400);
                }

                $product = DB::table('engagement_rings')->where('item_sku','=',$request->sku)->first();

                if (!$product) {
                    return response()->json(['status'=>'error','message'=>'Product Does Not Exist'],400);
                }

                $allshape = DB::table('engagement_rings')->where('item_code','=',$product->item_code)->get('stoneshape')->unique('stoneshape')->pluck('stoneshape')->toArray();

                if (in_array("Square",$allshape)) {
                    array_push($allshape,"Princess");
                }else if (in_array("Princess",$allshape)) {
                    array_push($allshape,"Square");
                }

                // if cart is empty then this the first product

                if ($product->sale_price != null) {
                    $price = $product->sale_price;
                }else{
                    $price = $product->price;
                }
     
                $setting = [
                    "id" => $product->item_sku,
                    "size"=>$request->size,
                    "img"=>$request->img,
                    "currency"=>$product->currency,
                    "price"=>$price,
                    "shape"=>$allshape,
                    "engraving"=>$request->engraving,
                    "url"=>$request->url
                ];
     
                session()->put('create_ring.engagement-ring', $setting);

                if (session('create_ring.stone')) {
                    return response()->json(['status'=>'valid','message'=>'complete-ring'],200);
                }else{
                    return response()->json(['status'=>'valid','message'=>'diamond'],200);
                }
                               
            }elseif ($request->type == "moissanite" || $request->type == "lab-grown-diamond" || $request->type == "diamonds") {

                if ($request->type == "moissanite") {
                    
                    $product = DB::table('moissanite')->where('item_sku','=',$request->sku)->first();
                
                    $stone = [
                        "name"=>$product->name,
                        "type"=>$product->file_type,
                        "stone_id" =>$product->id,
                        "stone" =>$request->type,
                        "stone_sku"=>$product->item_sku,
                        "shape"=>$product->shape,
                        "size"=>$product->MM,
                        "color"=>"E-D-F",
                        "clarity"=>null,
                        "carat"=>$product->carat,
                        "currency"=>$product->currency,
                        "retail"=>$product->price,
                        "cert_num"=>$product->item_sku,
                        "shape"=>$product->shape,
                        "img"=>$request->img,
                        "video"=>$product->video_link,
                        "url"=>$request->url,
                        "link"=>null                       
                    ];

                }else if($request->type == "lab-grown-diamond" || $request->type == "diamonds"){

                    $cart = session()->get('cart.shopping_cart');

                    if ($request->type == "lab-grown-diamond") {
                        $product = DB::table('lab_grown_diamonds')->where('item_sku','=',$request->sku)->first();
                    }elseif($request->type == "diamonds"){
                        $product = DB::table('natural_diamonds')->where('item_sku','=',$request->sku)->first();
                    }

                    if (!empty(session('cart.shopping_cart'))) {
                        foreach (session('cart.shopping_cart') as $count => $key) {
                            // stone itself in cart
                          if(in_array($request->sku,$key)){
                            unset($cart[$count]);
                            session()->put('cart.shopping_cart', $cart);
                            // return response()->json(['status'=>'error','message'=>'Already In Cart'],400);
                          }
                          if (isset($key['stone'])) {
                            // stone in custom product
                            if(in_array($request->sku,$key['stone'])) {
                                return response()->json(['status'=>'error','message'=>'Already In Cart'],400);
                              }
                          }
                        }
                    }
                
                    $stone = [
                        "name"=>$product->name,
                        "type"=>$product->file_type,
                        "stone_id" =>$product->id,
                        "stone" =>$request->type,
                        "stone_sku"=>$product->item_sku,
                        "shape" =>$product->shape,
                        "size" =>$product->width." By ".$product->length,
                        "color" =>$product->color,
                        "clarity" =>$product->clarity,
                        "carat" =>$product->carat,
                        "currency"=>$product->currency,
                        "retail" =>$product->price,
                        "cert_num"=>$product->item_sku,
                        "img"=>$request->img,
                        "video"=>$product->video_link,
                        "url"=>$request->url,
                        "link"=>$product->item_link                        
                    ];

                }else{
                    return response()->json(['status'=>'error','message'=>'Please Try Again'],400);
                }

                session()->put('create_ring.stone', $stone);

                if (session('create_ring.engagement-ring')) {
                    return response()->json(['status'=>'valid','message'=>'complete-ring'],200);
                }else{
                    return response()->json(['status'=>'valid','message'=>'engagement-ring'],200);
                }

            }else{
                return response()->json(['status'=>'error','message'=>'Please Try Again'],400);
            }

        }else{
            return response()->json(['status'=>'error','message'=>'Please Try Again'],400);
        }
    }



    public function complete_ring(){

        if (session('create_ring.engagement-ring') AND session('create_ring.stone')) {

                $product = DB::table('engagement_rings')->where('item_sku',session('create_ring.engagement-ring')["id"])->first();

                $similar = DB::table('engagement_rings')->inRandomOrder()->take(10)->get();

                $images=[];

                for($i = 2; $i < 8; $i++){

                    $img = $product->image.'-'.$i.'.jpg';

                    if (File::exists(public_path('storage/image/engagement-ring/'.$img))) {
                        $images[] = $img;
                    }else{
                        continue;
                    }

                }

                if (session('create_ring.stone')['shape'] == "Square") {
                    $shapeimg = DB::table('engagement_rings')->where('item_code',$product->item_code)->where('stoneshape',"Princess")->where('color',$product->color)->value('image');
                }else{
                    $shapeimg = DB::table('engagement_rings')->where('item_code',$product->item_code)->where('stoneshape',session('create_ring.stone')['shape'])->where('color',$product->color)->value('image');
                }
            
                return view('product.complete-ring',['type'=>'engagement-ring','product' => $product,'shapeimg'=>$shapeimg,'similar'=>$similar,'images'=>$images]);
            
        }else{
            return redirect('/engagement-ring');
        }

    
    }

    public function add_complete_ring(Request $request){

        $product = DB::table('engagement_rings')->where('item_sku','=',session('create_ring.engagement-ring')['id'])->first();

        if (!$product) {
            return response()->json(['status'=>'error','message'=>'Please Try Again'],400);
        }

        if (!$request->size) {
            return response()->json(['status'=>'error','message'=>'Please Select Ring Size'],400);
        }

        $cart = session()->get('cart.shopping_cart');
                    
        if ($product->sale_price != null) {
            $price = $product->sale_price;
        }else{
            $price = $product->price;
        }

        $cart[] = [
            "lot"=>"custom-engagement-ring",
            "type"=>$product->file_type,
            "style"=>$product->style,
            "category"=>"ring",
            "sku"=>session('create_ring.engagement-ring')['id'],
            "id" => $product->id,
            "default_img"=>session('create_ring.engagement-ring')['img'],
            "name"=>$product->name." With Center Stone",
            "currency"=>$product->currency,
            "price"=>$price,
            "cad_price"=>number_format(\App\Helper\AppHelper::conversion($product->currency, $price,'CAD'),2, '.', ''),
            "size" => $request->size,
            "engraving"=>$request->engraving,
            "return"=>"No",
            "url"=>session('create_ring.engagement-ring')['url'],
            "brand"=>$product->brand,
            "link"=>$product->item_link,
            "stone" =>[
                "type"=>session('create_ring.stone')['type'],
                "stone_id" =>session('create_ring.stone')['stone_id'],
                "stone_sku"=>session('create_ring.stone')['stone_sku'],
                "name"=>session('create_ring.stone')["name"],
                "default_img"=>session('create_ring.stone')["img"],
                "shape" =>session('create_ring.stone')['shape'],
                "size" =>null,
                "engraving"=>null,
                "color" =>session('create_ring.stone')['color'],
                "clarity" =>session('create_ring.stone')['clarity'],
                "carat" =>session('create_ring.stone')['size'],
                "currency"=>session('create_ring.stone')['currency'],
                "cad_price"=>number_format(\App\Helper\AppHelper::conversion(session('create_ring.stone')['currency'],session('create_ring.stone')['retail'],'CAD'),2, '.', ''),
                "price" =>session('create_ring.stone')['retail'],
                "cert_num"=>session('create_ring.stone')['cert_num'],
                "url"=>session('create_ring.stone')['url'],
                "link"=>session('create_ring.stone')['link']
            ]
        ];
    
        session()->forget(['create_ring']);
        session()->put('cart.shopping_cart', $cart);

        return response()->json(['status'=>'valid','message'=>'Product Added To Cart'],200);

    }



}
