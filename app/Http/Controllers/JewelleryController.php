<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;

class JewelleryController extends Controller
{
    public function engagement_ring(Request $request){
        return \App\Helper\JewelleryHelper::engagement_ring_helper($request,'');
    }

    public function wedding_band(Request $request){
        return \App\Helper\JewelleryHelper::wedding_band_helper($request,'');
    }

    public function fine_jewellery(Request $request){
        return \App\Helper\JewelleryHelper::fine_jewellery_helper($request,'');
    }

    public function moissanite(Request $request){
       return \App\Helper\JewelleryHelper::moissanite_helper($request,'');
    }

    public function lab_grown(Request $request){
        return \App\Helper\JewelleryHelper::lab_grown_helper($request,'');
    }

    public function diamonds(Request $request){
        return \App\Helper\JewelleryHelper::diamonds_helper($request,'');
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
                        'link_sku'=>$value->item_sku,
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
                        'image'=>Storage::disk('s3')->url('image/'.$value->file_type.'-list/'.$value->image.'-1.jpg', env('AWS_TIME')),
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

}
