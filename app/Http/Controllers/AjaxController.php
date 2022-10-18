<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Storage;

class AjaxController extends Controller
{
    public function engagement_setting(Request $request){
        return \App\Helper\JewelleryHelper::ajax_engagement_ring_helper($request);
    }

    public function wedding_bands(Request $request){
        return \App\Helper\JewelleryHelper::ajax_wedding_bands_helper($request);
    }

    public function fine_jewellerys(Request $request){
        return \App\Helper\JewelleryHelper::ajax_fine_jewellerys_helper($request);
    }

    public function moissanite(Request $request){
          return \App\Helper\JewelleryHelper::ajax_moissanite_helper($request);
    }

    public function lab_diamond(Request $request){
        return \App\Helper\JewelleryHelper::ajax_lab_diamond_helper($request);
    }

    public function natural_diamond(Request $request){
        return \App\Helper\JewelleryHelper::ajax_natural_diamond_helper($request);
    }

    public function filter_lab_diamond(Request $request){
        return \App\Helper\JewelleryHelper::ajax_lab_diamond_filter_helper($request);
    }

    public function filter_natural_diamond(Request $request){
        return \App\Helper\JewelleryHelper::ajax_nat_diamond_filter_helper($request);
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

                return view('shop.ajax.search',['products'=>collect($array)]);
    
        }

    }


}
