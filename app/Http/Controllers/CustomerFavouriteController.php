<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Favourite;

class CustomerFavouriteController extends Controller
{


    public function favourite(Request $request){
        if ($request->ajax() && Auth::user()) {

            $product = DB::table('favourites')
            ->where('user_id',Auth::id())
            ->where('item_sku',$request->sku)
            ->get(); 
            if (count($product)===0) {
                $fav = new Favourite;
                $fav->user_id = Auth::id();
                $fav->img = $request->img;
                $fav->item_sku = $request->sku;
                $fav->link = $request->link;
                $fav->save();

                return response()->json(['status'=>'valid','message'=>'Product Added To Favourite'],200);

            }else{
                return response()->json(['status'=>'error','message'=>'Product Already Added'],400);
            }
        }else{
            return response()->json(['status'=>'error','message'=>'Please Log In'],400);
        }
    }

    public function remove_favourite(Request $request){
        if ($request->ajax() && Auth::user()) {
        DB::table('favourites')->where('item_sku','=',$request->sku)->where('user_id','=',Auth::id())->delete();
        }
    }

    public function favourite_product(){

        $fav = DB::table('favourites')->where('user_id',Auth::id())->get();

        if (count($fav)> 0) {

            $wedding = DB::table('favourites')
            ->join('wedding_bands','wedding_bands.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $engagement = DB::table('favourites')
            ->join('engagement_rings','engagement_rings.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $finejewellery = DB::table('favourites')
            ->join('fine_jewelleries','fine_jewelleries.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $moissanite = DB::table('favourites')
            ->join('moissanite','moissanite.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $lab = DB::table('favourites')
            ->join('lab_grown_diamonds','lab_grown_diamonds.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $dia = DB::table('favourites')
            ->join('natural_diamonds','natural_diamonds.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $item = ($wedding->merge($engagement)->merge($finejewellery)->merge($moissanite)->merge($lab)->merge($dia));

            return view('account.wishlist',['item'=>$item]);
        }else{
            return view('account.wishlist');
        }
    }




}
