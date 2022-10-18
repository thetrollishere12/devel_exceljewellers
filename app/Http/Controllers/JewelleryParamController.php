<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;

class JewelleryParamController extends Controller
{
    

    public function engagement_ring(Request $request, $param){

        return \App\Helper\JewelleryHelper::engagement_ring_helper($request,[$param]);

    }

    public function wedding_band(Request $request, $param){
        
        return \App\Helper\JewelleryHelper::wedding_band_helper($request,[$param]);

    }

    public function fine_jewellery(Request $request, $param){

        return \App\Helper\JewelleryHelper::fine_jewellery_helper($request,[$param]);
        
    }

    public function fine_jewellery_param2(Request $request, $param,$param2){

        $params = [];

        array_push($params,$param,$param2);

        return \App\Helper\JewelleryHelper::fine_jewellery_helper($request,$params);
        
    }

    public function fine_jewellery_param3(Request $request, $param,$param2,$param3){

        $params = [];

        array_push($params,$param,$param2,$param3);

        return \App\Helper\JewelleryHelper::fine_jewellery_helper($request,$params);
        
    }

    public function moissanite(Request $request,$param){

       return \App\Helper\JewelleryHelper::moissanite_helper($request,[$param]);

    }

    public function lab_grown(Request $request,$param){

        return \App\Helper\JewelleryHelper::lab_grown_helper($request,[$param]);

    }

    public function diamonds(Request $request,$param){

        return \App\Helper\JewelleryHelper::diamonds_helper($request,[$param]);

    }

}
