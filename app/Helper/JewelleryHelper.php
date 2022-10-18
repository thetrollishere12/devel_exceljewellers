<?php

namespace App\Helper;

use DB;
use Storage;

class JewelleryHelper{

    public static function param_filter($request,$param){

        $filter = [];

        if ($param) {
            
            foreach ($param as $value) {
                $params = explode('-', $value);
                $request[$params[0]] = $params[1];
            }

        }

        return $request;

    }

	public static function engagement_ring_helper($request,$param){

        $request = JewelleryHelper::param_filter($request,$param);
        $filter = $request;

		$unique = DB::table('engagement_rings')
        ->when($request->category != null, function($q){
            $q->where('style',str_replace(['+','%20'], ' ', request('category')));
        })
        ->when($request->brand != null, function($q){
            $q->where('brand','LIKE','%'.request('brand').'%');
        })
        ->when($request->shape != null, function($q){
            $q->where('stoneshape','LIKE','%'.request('shape').'%');
        })
        ->when($request->color != null, function($q){
            $q->where('color','LIKE','%'.request('color').'%');
        })
        ->when($request->metal != null, function($q){
            $q->where('metal',request('metal'));
        })
        ->when($request->video == "image_360", function($q){
            $q->where('image_360','!=',null);
        })
        ->when($request->sort == "high", function($q){
            $q->orderByDesc('price');
        })
        ->when($request->sort == "low", function($q){
            $q->orderBy('price');
        })
        ->get(['item_code','item_sku','color','stoneshape','brand','metal','style','name','image','currency','price','sale_price','image_360'])->unique('item_code');

        $count = ceil($unique->count()/24);
        
        $all =$unique->pluck('item_sku');
    
        $engagement = $unique->take(24);

        $array=[];

        foreach ($engagement as $key => $value) {

            $other_metal_color = DB::table('engagement_rings')->where('item_code',$value->item_code)->where('item_sku','!=',$value->item_sku)->where('color','!=',$value->color)->where('stoneshape',$value->stoneshape)->orderBy('price','ASC')->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

            $array[] = [
                "product"=>$value,
                "other_color"=>$other_metal_color
            ];

        }

        $path = storage_path()."/json/engagement-ring.json";
        $product = json_decode(file_get_contents($path), true); 

        try{
                                                                        
            return view('shop/products',['type'=>'engagement-ring','data'=>$product[str_replace('+',' ',strtolower(($request->brand) ? $request->brand : $request->category))],'products'=>$array,'count'=>$count,'all'=>$all,'param'=>$request,'filter'=>$filter]);

        }catch(\Exception $e){
            return redirect('error');
        }


	}





	public static function wedding_band_helper($request,$param){

        $request = JewelleryHelper::param_filter($request,$param);
        $filter = $request;

		$unique = DB::table('wedding_bands')
        ->when($request->category != null, function($q){
            $q->where('style',str_replace(['+','%20'], ' ', request('category')));
        })
        ->when($request->brand != null, function($q){
            $q->where('brand','LIKE','%'.request('brand').'%');
        })
        ->when($request->color != null, function($q){
            $q->where('color','LIKE','%'.request('color').'%');
        })
        ->when($request->metal != null, function($q){
            $q->where('metal',request('metal'));
        })
        ->when($request->video == "image_360", function($q){
            $q->where('image_360','!=',null);
        })
        ->when($request->sort == "high", function($q){
            $q->orderBy('price','DESC');
        })
        ->when($request->sort == "low", function($q){
            $q->orderBy('price','ASC');
        })
        ->get(['item_code','item_sku','color','brand','metal','style','name','image','currency','price','sale_price','image_360'])->unique('item_code');

        $count = ceil($unique->count()/24);
        
        $all =$unique->pluck('item_sku');
    
        $wedding = $unique->take(24);

        $array=[];

        foreach ($wedding as $key => $value) {

            $other_metal_color = DB::table('wedding_bands')->where('item_code',$value->item_code)->where('item_sku','!=',$value->item_sku)->where('color','!=',$value->color)->orderBy('price','ASC')->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

            $array[] = [
                "product"=>$value,
                "other_color"=>$other_metal_color
            ];

        }

        $path = storage_path()."/json/wedding-band.json";
        $product = json_decode(file_get_contents($path), true); 

        try{

        return view('shop/products',['type'=>'wedding-band','data'=>$product[str_replace('+',' ',strtolower(($request->brand) ? $request->brand : $request->category))],'products'=>$array,'count'=>$count,'all'=>$all,'param'=>$request,'filter'=>$filter]);

        }catch(\Exception $e){
            return redirect('error');
        }



	}

	public static function fine_jewellery_helper($request,$param){

        $request = JewelleryHelper::param_filter($request,$param);
        $filter = $request;

        $fine_jewellery = DB::table('fine_jewelleries');

        $unique = DB::table('fine_jewelleries')
        ->when($request->category != null, function($q){
            $q->where('category','LIKE',request('category'));
        })
        ->when($request->style != null, function($q){
            $q->where('style',str_replace('+', ' ', request('style')));
        })
        ->when($request->brand != null, function($q){
            $q->where('brand','LIKE','%'.request('brand').'%');
        })
        ->when($request->color != null, function($q){
            $q->where('color','LIKE','%'.request('color').'%');
        })
        ->when($request->metal != null, function($q){
            $q->where('metal',request('metal'));
        })
        ->when($request->video == "image_360", function($q){
            $q->where('image_360','!=',null);
        })
        ->when($request->gem != null && $request->gem == "gemstone", function($q){
            $q->where('main_stone','!=',null)->where('main_stone','!=',"")->where('main_stone','!=','diamond');
        })
        ->when($request->gem != null && $request->gem != "gemstone", function($q){
            $q->where('main_stone','!=',null)->where('main_stone','!=',"")->where('main_stone',request('gem'));
        })
        ->when($request->sort == "high", function($q){
            $q->orderBy('price','DESC');
        })
        ->when($request->sort == "low", function($q){
            $q->orderBy('price','ASC');
        })
        ->get(['item_code','item_sku','color','brand','metal','main_stone','style','name','image','currency','price','sale_price','image_360'])->unique('item_code');

        $count = ceil($unique->count()/24);
        
        $all =$unique->pluck('item_sku');
    
        $fine_jewellery = $unique->take(24);

        $array=[];

        foreach ($fine_jewellery as $key => $value) {

            $other_metal_color = DB::table('fine_jewelleries')->where('item_code',$value->item_code)->where('main_stone',$value->main_stone)->where('item_sku','!=',$value->item_sku)->where('color','!=',$value->color)->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

            $array[] = [
                "product"=>$value,
                "other_color"=>$other_metal_color
            ];

            if ($request->gem == null) {

                $similar_stone_product = DB::table('fine_jewelleries')->where('item_code',$value->item_code)->where('item_sku','!=',$value->item_sku)->where('main_stone','!=',$value->main_stone)->get()->unique('main_stone');

                foreach ($similar_stone_product as $key2 => $value2) {
                
                    $other_metal_color = DB::table('fine_jewelleries')->where('item_code',$value2->item_code)->where('item_sku','!=',$value2->item_sku)->where('color','!=',$value2->color)->where('main_stone','=',$value2->main_stone)->orderBy('price','ASC')->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

                    $array[] = [
                        "product"=>$value2,
                        "other_color"=>$other_metal_color
                    ];

                }

            }

        }

        $path = storage_path()."/json/fine-jewellery.json";
        $product = json_decode(file_get_contents($path), true); 


        try{

        return view('shop/products',['type'=>'fine-jewellery','data'=>$product[str_replace('+',' ',strtolower(($request->style) ? $request->style : $request->category))],'products'=>$array,'count'=>$count,'all'=>$all,'param'=>$request,'filter'=>$filter]);
        
        }catch(\Exception $e){
            return redirect('error');
        }


	}


	public static function moissanite_helper($request,$param){

        $request = JewelleryHelper::param_filter($request,$param);
        $filter = $request;

		$unique = DB::table('moissanite')
        ->when($request->shape != null, function($q){
            $q->where('shape',request('shape'));
        })
        ->when($request->width != null, function($q){

            if (strpos(request('width'), '.') !== false) {
                $q->where('MM','LIKE','%'.preg_replace("/[^0-9.]/", "", request('width')).'%');
            }else{
                $q->where('MM','LIKE','%'.preg_replace("/[^0-9.]/", "", request('width')).'%')->where('MM','NOT LIKE','%.%');
            }

        })
        ->when($request->carat != null, function($q){
            $c = explode("-",  request('carat'));
            $q->whereBetween('carat', [$c[0],$c[1]]);
        })
        ->get();

        $count = ceil($unique->count()/24);
        $all =$unique->pluck('item_sku');
        $db = $unique->take(24);

        $path = storage_path()."/json/moissanite.json";
        $product = json_decode(file_get_contents($path), true); 

        try{

            return view('shop/moissanite',['type'=>'moissanite','data'=>$product[strtolower($request->shape)],'products'=>$db,'count'=>$count,'all'=>$all,'param'=>$request,'filter'=>$filter]);

        }catch(\Exception $e){
            return redirect('error');
        }

	}

	public static function lab_grown_helper($request,$param){
		
        $request = JewelleryHelper::param_filter($request,$param);
        $filter = $request;

		$lab = DB::table('lab_grown_diamonds')->when($request->shape != null, function($q){
            $q->where('shape','LIKE','%'.request('shape').'%');
        })->when($request->cut != null, function($q){
            if (request('cut') != "All_Cuts") {
                $q->where('cut','LIKE','%'.request('cut').'%');
            }
        })->get();

        $high = $lab->max('price');

        $carat = $lab->max('carat');

        $count = ceil($lab->count()/24);
        $all =$lab->pluck('item_sku');
        $db = $lab->take(24);

        $path = storage_path()."/json/lab-diamond.json";
        $product = json_decode(file_get_contents($path), true); 

        try{

        return view('shop/stones',['type'=>'lab-grown-diamond','data'=>$product[strtolower($request->shape)],'products'=>$db,'count'=>$count,'all'=>$all,'high'=>$high,'carat'=>$carat,'param'=>$request,'filter'=>$filter]);

        }catch(\Exception $e){
            return redirect('error');
        }

	}

	public static function diamonds_helper($request,$param){
		
        $request = JewelleryHelper::param_filter($request,$param);
        $filter = $request;

		$gem = DB::table('natural_diamonds')->when($request->shape != null, function($q){
            $q->where('shape','LIKE','%'.request('shape').'%');
        })->when($request->cut != null, function($q){
            if (request('cut') != "All_Cuts") {
                $q->where('cut','LIKE','%'.request('cut').'%');
            }
        })->get();

        $high = $gem->max('price');

        $carat = $gem->max('carat');

        $count = ceil($gem->count()/24);
        $all =$gem->pluck('item_sku');
        $db = $gem->take(24);

        $path = storage_path()."/json/natural-diamond.json";
        $product = json_decode(file_get_contents($path), true); 

        try{

            return view('shop/stones',['type'=>'diamonds','data'=>$product[strtolower($request->shape)],'products'=>$db,'count'=>$count,'all'=>$all,'high'=>$high,'carat'=>$carat,'param'=>$request,'filter'=>$filter]);

        }catch(\Exception $e){
            return redirect('error');
        }

	}




	public function ajax_engagement_ring_helper($request){

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



	public function ajax_wedding_bands_helper($request){

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

	public function ajax_fine_jewellerys_helper($request){

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

	public function ajax_moissanite_helper($request){

		if ($request->ajax()) {

            $products = DB::table('moissanite')
            ->whereIn('item_sku',$request->product)->get();
    
            return view('shop.ajax.moissanite',['type'=>'moissanite','products'=>$products]);
        }

	}

	public function ajax_lab_diamond_helper($request){

		if ($request->ajax()) {

            $products = DB::table('lab_grown_diamonds')
            ->whereIn('item_sku',$request->product)->get();

            return view('shop.ajax.stones',['type'=>'lab-grown-diamond','products'=>$products]);
        }

	}

	public function ajax_natural_diamond_helper($request){

		if ($request->ajax()) {

            $products = DB::table('natural_diamonds')
            ->whereIn('item_sku',$request->product)->get();

            return view('shop.ajax.stones',['type'=>'diamonds','products'=>$products]);
        }

	}


    public function ajax_lab_diamond_filter_helper($req){

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
            if (request('cut') != "All_Cuts") {
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

        return view('shop.ajax.filter_stones',['type'=>'lab-grown-diamond','products'=>$products,'count'=>$count,'all'=>$all]);

    }


    public function ajax_nat_diamond_filter_helper($req){

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
            if (request('cut') != "All_Cuts") {
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

}
