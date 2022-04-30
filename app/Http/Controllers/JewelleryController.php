<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class JewelleryController extends Controller
{
    public function engagement_ring(Request $request){

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

        return view('shop/products',['type'=>'engagement-ring','data'=>$product[str_replace('+',' ',strtolower(($request->brand) ? $request->brand : $request->category))],'products'=>$array,'count'=>$count,'all'=>$all]);
            
    }

    public function wedding_band(Request $request){
        
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
    
        $engagement = $unique->take(24);

        $array=[];

        foreach ($engagement as $key => $value) {

            $other_metal_color = DB::table('wedding_bands')->where('item_code',$value->item_code)->where('item_sku','!=',$value->item_sku)->where('color','!=',$value->color)->orderBy('price','ASC')->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

            $array[] = [
                "product"=>$value,
                "other_color"=>$other_metal_color
            ];

        }

        $path = storage_path()."/json/wedding-band.json";
        $product = json_decode(file_get_contents($path), true); 

        return view('shop/products',['type'=>'wedding-band','data'=>$product[str_replace('+',' ',strtolower(($request->brand) ? $request->brand : $request->category))],'products'=>$array,'count'=>$count,'all'=>$all]);

    }

    public function fine_jewellery(Request $request){

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

        return view('shop/products',['type'=>'fine-jewellery','data'=>$product[str_replace('+',' ',strtolower(($request->style) ? $request->style : (($request->gem) ? $request->gem : $request->category)))],'products'=>$array,'count'=>$count,'all'=>$all]);
        
    }

    public function search(Request $request){

        if (empty($request->search)) {
            $product = [];
            return view('ajax.search',['search'=>$product]);
        }else{
            $search =  str_replace('+',' ', $request->search);
            
            if ($request->category) {
                
                switch($request->category){
                    case "engagement-ring":

                    $found = DB::table('engagement_rings')
                    ->where('color','LIKE',"%$search%")
                    ->orWhere('style','LIKE',"%$search%")
                    ->orWhere('item_sku','LIKE',"%$search%")
                    ->orWhere('metal','LIKE',"%$search%")
                    ->orWhere('brand','LIKE',"%$search%")
                    ->orWhere('collection','LIKE',"%$search%")
                    ->orWhere('description','LIKE',"%$search%")
                    ->orWhere('brand','LIKE',"%$search%")
                    ->orWhere('name','LIKE',"%$search%")->get();
                    break;
                    case "wedding-band":

                    $found = DB::table('wedding_bands')
                    ->where('color','LIKE',"%$search%")
                    ->orWhere('style','LIKE',"%$search%")
                    ->orWhere('item_sku','LIKE',"%$search%")
                    ->orWhere('metal','LIKE',"%$search%")
                    ->orWhere('brand','LIKE',"%$search%")
                    ->orWhere('collection','LIKE',"%$search%")
                    ->orWhere('description','LIKE',"%$search%")
                    ->orWhere('brand','LIKE',"%$search%")
                    ->orWhere('name','LIKE',"%$search%")->get();
                    break;
                    case "fine-jewellery":

                    $found = DB::table('fine_jewelleries')
                    ->where('color','LIKE',"%$search%")
                    ->orWhere('style','LIKE',"%$search%")
                    ->orWhere('item_sku','LIKE',"%$search%")
                    ->orWhere('metal','LIKE',"%$search%")
                    ->orWhere('brand','LIKE',"%$search%")
                    ->orWhere('collection','LIKE',"%$search%")
                    ->orWhere('description','LIKE',"%$search%")
                    ->orWhere('brand','LIKE',"%$search%")
                    ->orWhere('name','LIKE',"%$search%")->get();
                    break;
                    case "lab-grown-diamond":

                    $found = DB::table('lab_grown_diamonds')
                    ->where('company','LIKE',"%$search%")
                    ->orWhere('item_sku','LIKE',"%$search%")
                    ->orWhere('shape','LIKE',"%$search%")
                    ->orWhere('polish','LIKE',"%$search%")
                    ->orWhere('name','LIKE',"%$search%")
                    ->orWhere('description','LIKE',"%$search%")
                    ->orWhere('clarity','LIKE',"%$search%")
                    ->orWhere('width','LIKE',"%$search%")
                    ->orWhere('file_type','LIKE',"%$search%")
                    ->orWhere('description','LIKE',"%$search%")
                    ->orWhere('length','LIKE',"%$search%")->get(); 
                    break;
                    case "natural-diamond":

                    $found = DB::table('natural_diamonds')
                    ->where('company','LIKE',"%$search%")
                    ->orWhere('item_sku','LIKE',"%$search%")
                    ->orWhere('shape','LIKE',"%$search%")
                    ->orWhere('polish','LIKE',"%$search%")
                    ->orWhere('name','LIKE',"%$search%")
                    ->orWhere('description','LIKE',"%$search%")
                    ->orWhere('clarity','LIKE',"%$search%")
                    ->orWhere('width','LIKE',"%$search%")
                    ->orWhere('file_type','LIKE',"%$search%")
                    ->orWhere('description','LIKE',"%$search%")
                    ->orWhere('length','LIKE',"%$search%")->get();
                    break;
                    case "moissanite":

                    $found = DB::table('moissanite')
                    ->orWhere('item_sku','LIKE',"%$search%")
                    ->orWhere('shape','LIKE',"%$search%")
                    ->orWhere('type','LIKE',"%$search%")
                    ->orWhere('weight','LIKE',"%$search%")
                    ->orWhere('carat','LIKE',"%$search%")
                    ->orWhere('file_type','LIKE',"%$search%")
                    ->orWhere('company','LIKE',"%$search%")
                    ->orWhere('name','LIKE',"%$search%")
                    ->orWhere('img_link','LIKE',"%$search%")->get(); 
                    break;
                    default:
                    $found = collect([]);
                    break;
                }

            }else{

                $eng = DB::table('engagement_rings')
                ->where('color','LIKE',"%$search%")
                ->orWhere('style','LIKE',"%$search%")
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('metal','LIKE',"%$search%")
                ->orWhere('brand','LIKE',"%$search%")
                ->orWhere('collection','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%")
                ->orWhere('brand','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")->get();

                $wed = DB::table('wedding_bands')
                ->where('color','LIKE',"%$search%")
                ->orWhere('style','LIKE',"%$search%")
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('metal','LIKE',"%$search%")
                ->orWhere('brand','LIKE',"%$search%")
                ->orWhere('collection','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%")
                ->orWhere('brand','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")->get();

                $fine = DB::table('fine_jewelleries')
                ->where('color','LIKE',"%$search%")
                ->orWhere('style','LIKE',"%$search%")
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('metal','LIKE',"%$search%")
                ->orWhere('brand','LIKE',"%$search%")
                ->orWhere('collection','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%")
                ->orWhere('brand','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")->get();

                $nat_dia = DB::table('natural_diamonds')
                ->where('company','LIKE',"%$search%")
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('shape','LIKE',"%$search%")
                ->orWhere('polish','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%")
                ->orWhere('clarity','LIKE',"%$search%")
                ->orWhere('width','LIKE',"%$search%")
                ->orWhere('file_type','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%")
                ->orWhere('length','LIKE',"%$search%")->get();

                $lab_dia = DB::table('lab_grown_diamonds')
                ->where('company','LIKE',"%$search%")
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('shape','LIKE',"%$search%")
                ->orWhere('polish','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%")
                ->orWhere('clarity','LIKE',"%$search%")
                ->orWhere('width','LIKE',"%$search%")
                ->orWhere('file_type','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%")
                ->orWhere('length','LIKE',"%$search%")->get(); 

                $moissanite = DB::table('moissanite')
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('shape','LIKE',"%$search%")
                ->orWhere('type','LIKE',"%$search%")
                ->orWhere('weight','LIKE',"%$search%")
                ->orWhere('carat','LIKE',"%$search%")
                ->orWhere('file_type','LIKE',"%$search%")
                ->orWhere('company','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")
                ->orWhere('img_link','LIKE',"%$search%")->get(); 

                $found = ($eng->merge($wed)->merge($fine)->merge($nat_dia)->merge($lab_dia)->merge($moissanite));

            }

            $count = ceil($found->count()/24);

            $all =$found->pluck('item_sku');

            $product = $found->take(24);

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

            return view('shop/search',['products'=>$array,'count'=>$count,'all'=>$all,'keyword'=>$request->search]);
        }
    }

    public function moissanite(Request $req){

        $unique = DB::table('moissanite')
        ->when($req->shape != null, function($q){
            $q->where('shape',request('shape'));
        })
        ->when($req->width != null, function($q){

            if (strpos(request('width'), '.') !== false) {
                $q->where('MM','LIKE','%'.preg_replace("/[^0-9.]/", "", request('width')).'%');
            }else{
                $q->where('MM','LIKE','%'.preg_replace("/[^0-9.]/", "", request('width')).'%')->where('MM','NOT LIKE','%.%');
            }

        })
        ->when($req->carat != null, function($q){
            $c = explode("-",  request('carat'));
            $q->whereBetween('carat', [$c[0],$c[1]]);
        })
        ->get();

        $count = ceil($unique->count()/24);
        $all =$unique->pluck('item_sku');
        $db = $unique->take(24);

        $path = storage_path()."/json/moissanite.json";
        $product = json_decode(file_get_contents($path), true); 

        return view('shop/moissanite',['type'=>'moissanite','data'=>$product[strtolower($req->shape)],'products'=>$db,'count'=>$count,'all'=>$all]);

    }

    public function lab_grown(Request $req){
        // return $req;

        $lab = DB::table('lab_grown_diamonds')->when($req->shape != null, function($q){
            $q->where('shape','LIKE','%'.request('shape').'%');
        })->when($req->cut != null, function($q){
            $q->where('cut','LIKE','%'.request('cut').'%');
        })->get();

        $high = $lab->max('price');

        $carat = $lab->max('carat');

        $count = ceil($lab->count()/24);
        $all =$lab->pluck('item_sku');
        $db = $lab->take(24);

        $path = storage_path()."/json/lab-diamond.json";
        $product = json_decode(file_get_contents($path), true); 

        return view('shop/stones',['type'=>'lab-grown-diamond','data'=>$product[strtolower($req->shape)],'products'=>$db,'count'=>$count,'all'=>$all,'high'=>$high,'carat'=>$carat]);

    }

    public function diamonds(Request $req){
        // return $req;

        $gem = DB::table('natural_diamonds')->when($req->shape != null, function($q){
            $q->where('shape','LIKE','%'.request('shape').'%');
        })->when($req->cut != null, function($q){
            $q->where('cut','LIKE','%'.request('cut').'%');
        })->get();

        $high = $gem->max('price');

        $carat = $gem->max('carat');

        $count = ceil($gem->count()/24);
        $all =$gem->pluck('item_sku');
        $db = $gem->take(24);

        $path = storage_path()."/json/natural-diamond.json";
        $product = json_decode(file_get_contents($path), true); 

        return view('shop/stones',['type'=>'diamonds','data'=>$product[strtolower($req->shape)],'products'=>$db,'count'=>$count,'all'=>$all,'high'=>$high,'carat'=>$carat]);

    }

}
