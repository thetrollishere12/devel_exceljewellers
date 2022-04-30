<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class AjaxController extends Controller
{
    public function engagement_setting(Request $request){
        if ($request->ajax()) {

        $engagement =  DB::table('engagement_rings')
        ->whereIn('item_sku',$request->product)->get(['item_code','item_sku','color','stoneshape','brand','metal','style','name','image','currency','price','sale_price','image_360']);

        $array=[];

        foreach ($engagement as $key => $value) {

            $other_metal_color = DB::table('engagement_rings')->where('item_code',$value->item_code)->where('item_sku','!=',$value->item_sku)->where('color','!=',$value->color)->where('stoneshape',$value->stoneshape)->orderBy('price','ASC')->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

            $array[] = [
                "product"=>$value,
                "other_color"=>$other_metal_color
            ];

        }

        return view('shop.ajax.products',['type'=>'engagement-ring','products'=>$array]);

    }

    }

    public function wedding_bands(Request $request){

        if ($request->ajax()) {
                
            $wedding_bands = DB::table('wedding_bands')
            ->whereIn('item_sku',$request->product)->get(['item_code','item_sku','color','brand','metal','style','name','image','currency','price','sale_price','image_360']);

            $array=[];

            foreach ($wedding_bands as $key => $value) {

                $other_metal_color = DB::table('wedding_bands')->where('item_code',$value->item_code)->where('item_sku','!=',$value->item_sku)->where('color','!=',$value->color)->orderBy('price','ASC')->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

                $array[] = [
                    "product"=>$value,
                    "other_color"=>$other_metal_color
                ];

            }

            return view('shop.ajax.products',['type'=>'wedding-band','products'=>$array]);
        }

    }

    public function fine_jewellerys(Request $request){

        if ($request->ajax()) {
            
        $fine_jewellery = DB::table('fine_jewelleries')->whereIn('item_sku',$request->product)->get(['item_code','item_sku','color','main_stone','brand','metal','style','name','image','currency','price','sale_price','image_360']);

        $array=[];

        foreach ($fine_jewellery as $key => $value) {

            $other_metal_color = DB::table('fine_jewelleries')->where('item_code',$value->item_code)->where('main_stone','=',$value->main_stone)->where('item_sku','!=',$value->item_sku)->where('color','!=',$value->color)->where('main_stone','=',$value->main_stone)->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency','image_360'])->unique(['color']);

            $array[] = [
                "product"=>$value,
                "other_color"=>$other_metal_color
            ];

            if ($request->gem == null) {

                $similar_stone_product = DB::table('fine_jewelleries')
                ->where('item_code',$value->item_code)
                ->where('main_stone','!=',$value->main_stone)
                ->where('item_sku','!=',$value->item_sku)
                ->get()->unique('main_stone');

                foreach ($similar_stone_product as $key2 => $value2) {
                
                    $other_metal_color = DB::table('fine_jewelleries')
                    ->where('item_code',$value2->item_code)
                    ->where('main_stone','=',$value2->main_stone)
                    ->where('item_sku','!=',$value2->item_sku)
                    ->where('color','!=',$value2->color)
                    ->orderBy('color','DESC')
                    ->get(['color','image','item_sku','item_code','name','price','carat','currency','image_360'])->unique('color');

                    $array[] = [
                        "product"=>$value2,
                        "other_color"=>$other_metal_color
                    ];

                }

            }

        }

        return view('shop.ajax.products',['type'=>'fine-jewellery','products'=>$array]);
    }

    }

    public function moissanite(Request $req){
            
        if ($req->ajax()) {

            $products = DB::table('moissanite')
            ->whereIn('item_sku',$req->product)->get();
    
            return view('shop.ajax.moissanite',['type'=>'moissanite','products'=>$products]);
        }
    }

    public function lab_diamond(Request $req){
        if ($req->ajax()) {

            $products = DB::table('lab_grown_diamonds')
            ->whereIn('item_sku',$req->product)->get();

            return view('shop.ajax.stones',['type'=>'lab-grown-diamond','products'=>$products]);
        }
    }

    public function natural_diamond(Request $req){
        if ($req->ajax()) {

            $products = DB::table('natural_diamonds')
            ->whereIn('item_sku',$req->product)->get();

            return view('shop.ajax.stones',['type'=>'diamonds','products'=>$products]);
        }
    }

    public function filter_lab_diamond(Request $req){

        $colors = ["N","M","L","K","J","I","H","G","F","E","D"];

        for($i=$req->colorfrom; $i<=$req->colorto; $i++) {
            $color[]=$colors[$i];
        }

        $claritys = ["I3","I2","I1","SI3","SI2","SI1","VS2","VS1","VVS2","VVS1","IF","FL"];

        for($i=$req->clarityfrom; $i<=$req->clarityto; $i++) {
            $clarity[]=$claritys[$i];
        }


        $lab = DB::table('lab_grown_diamonds')
        ->when($req->shape != null, function($q){
            $q->where('shape','LIKE','%'.request('shape').'%');
        })->when($req->cut != null, function($q){
            if ($req->cut != "All Cuts") {
                $q->where('cut','LIKE','%'.request('cut').'%');
            }
        })
        ->when($req->caratto != null, function($q){
            $q->whereBetween('carat', [request('caratfrom'),request('caratto')]);
        })
        ->when($req->priceto != null, function($q){
            $q->whereBetween('price', [request('pricefrom'),request('priceto')]);
        });
        // ->when($req->clarityto != null, function($q, $clarity){
        //     $q->whereIn('clarity',$clarity);
        // })
        // ->when($req->ccolorto != null, function($q, $color){
        //     $q->whereIn('color',$color);
        // })
        // ->get();

        if ($req->clarityto) {
            $lab->whereIn('clarity',$clarity);
        }

        if ($req->colorto) {
            $lab->whereIn('color',$color);
        }

        $count = ceil($lab->count()/24);
        $all =$lab->pluck('item_sku');
        $products = $lab->get()->take(24);

        return view('shop.ajax.filter_stones',['type'=>'diamonds','products'=>$products,'count'=>$count,'all'=>$all]);

    }

    public function filter_natural_diamond(Request $req){

        $colors = ["N","M","L","K","J","I","H","G","F","E","D"];

        for($i=$req->colorfrom; $i<=$req->colorto; $i++) {
            $color[]=$colors[$i];
        }

        $claritys = ["I3","I2","I1","SI3","SI2","SI1","VS2","VS1","VVS2","VVS1","IF","FL"];

        for($i=$req->clarityfrom; $i<=$req->clarityto; $i++) {
            $clarity[]=$claritys[$i];
        }


        $stones = DB::table('natural_diamonds')
        ->when($req->shape != null, function($q){
            $q->where('shape','LIKE','%'.request('shape').'%');
        })->when($req->cut != null, function($q){
            if ($req->cut != "All Cuts") {
                $q->where('cut','LIKE','%'.request('cut').'%');
            }
        })
        ->when($req->caratto != null, function($q){
            $q->whereBetween('carat', [request('caratfrom'),request('caratto')]);
        })
        ->when($req->priceto != null, function($q){
            $q->whereBetween('price', [request('pricefrom'),request('priceto')]);
        });
        // ->when($req->clarityto != null, function($q, $clarity){
        //     $q->whereIn('clarity',$clarity);
        // })
        // ->when($req->ccolorto != null, function($q, $color){
        //     $q->whereIn('color',$color);
        // })
        // ->get();

        if ($req->clarityto) {
            $stones->whereIn('clarity',$clarity);
        }

        if ($req->colorto) {
            $stones->whereIn('color',$color);
        }

        $count = ceil($stones->count()/24);
        $all =$stones->pluck('item_sku');
        $products = $stones->get()->take(24);

        return view('shop.ajax.filter_stones',['type'=>'diamonds','products'=>$products,'count'=>$count,'all'=>$all]);

    }

    public function currency(Request $request){
 
        session()->put('currency',$request->currency);
 
    }

    public function search(Request $request){
        if ($request->ajax()) {
            
                $eng = DB::table('engagement_rings')
                ->whereIn('item_sku',$request->product)->get();
                $wed = DB::table('wedding_bands')
                ->whereIn('item_sku',$request->product)->get();
                $fine = DB::table('fine_jewelleries')
                ->whereIn('item_sku',$request->product)->get();
                $nat_dia = DB::table('natural_diamonds')
                ->whereIn('item_sku',$request->product)->get();
                $lab_dia = DB::table('lab_grown_diamonds')
                ->whereIn('item_sku',$request->product)->get();
                $moissanite = DB::table('moissanite')
                ->whereIn('item_sku',$request->product)->get();

                $product = ($eng->merge($wed)->merge($fine)->merge($nat_dia)->merge($lab_dia)->merge($moissanite));

                $array=[];

                foreach ($product as $key => $value) {

                    if ($value->file_type == "lab-grown-diamond" OR $value->file_type == "natural-diamond" OR $value->file_type == "moissanite") {

                        if ($value->file_type == "moissanite") {
                            $image = asset('storage/image/moissanite/'.$value->img_link.'.jpg');
                        }else{
                            $image = $value->img_link;
                        }
                        
                        $array[] = [
                            'file_type'=>$value->file_type,
                            'link_sku'=>$value->id,
                            'name'=>$value->name,
                            'image'=>$image,
                            'image_360'=>$value->video_link,
                            'currency'=>$value->currency,
                            'price'=>$value->price,
                            'sale_price'=>null,
                            'metal'=>null,
                            'color'=>null,
                            'style'=>$value->shape,
                            'brand'=>$value->company
                        ];
                    }

                    if ($value->file_type == "engagement-ring" OR $value->file_type == "fine-jewellery" OR $value->file_type == "wedding-band") {
                        $array[] = [
                            'file_type'=>$value->file_type,
                            'link_sku'=>$value->item_sku,
                            'name'=>$value->name,
                            'image'=>asset('storage/image/'.$value->file_type.'-list/'.$value->image.'-1.jpg'),
                            'image_360'=>$value->image_360,
                            'currency'=>$value->currency,
                            'price'=>$value->price,
                            'sale_price'=>$value->sale_price,
                            'metal'=>$value->metal,
                            'color'=>$value->color,
                            'style'=>$value->style,
                            'brand'=>$value->brand
                        ];
                    }

                }

                return view('shop.ajax.search',['products'=>collect($array)]);
    
        }

    }


}
