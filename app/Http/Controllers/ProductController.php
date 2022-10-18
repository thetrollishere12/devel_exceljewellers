<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\fine_jewellery;
use Auth;
use File;
use App\Helper\AppHelper;
use Stripe;
use Storage;

class ProductController extends Controller
{
    public function engagement_ring($id){

        $product = DB::table('engagement_rings')->where('item_sku',$id)->first();

        if ($product) {

            DB::table('engagement_rings')->where('item_sku',$id)->increment("count",1);

            $item_code = $product->item_code;
            
            $metal = DB::table('engagement_rings')->where('item_sku','not like',$id)->where('item_code',$item_code)->orderBy('color','DESC')->get(['metal','color','item_sku','stoneshape']);

            $m10 = $metal->where('stoneshape',$product->stoneshape)->where('metal','10K')->unique('color');

            $m14 = $metal->where('stoneshape',$product->stoneshape)->where('metal','14K')->unique('color');

            $m18 = $metal->where('stoneshape',$product->stoneshape)->where('metal','18K')->unique('color');

            $other = $metal->where('stoneshape',$product->stoneshape)->whereNotIn('metal',['10K','14K','18K'])->unique('color');

            $metal_alternative = array_merge(
                $m10->toArray(),
                $m14->toArray(),
                $m18->toArray(),
                $other->toArray()
            );

            $shape = $metal->where('stoneshape','!=',$product->stoneshape)->unique('stoneshape');

            $ratings = DB::table('ratings')->where('item_sku','=',$id)->get('ratings');
            
            $reviews = DB::table('users')
            ->select('name','ratings','ratings.created_at','comment')
            ->join('ratings','ratings.user_id','=','users.id')
            ->where('item_sku','=',$id)->get();

            for ($i=1; $i < strlen($id)-4; $i++) { 
                $pair =  DB::table('wedding_bands')->where('item_sku','like','%'.substr($id,0,-$i).'%')->where('color',$product->color)->inRandomOrder()->limit(1)->get()->unique('item_code');
                if (count($pair)>0) {
                    break;
                }
            }

            if ($product->brand == "GabrielCo") {
                $pair =  DB::table('wedding_bands')->where('item_sku','like','%'.substr($id,2).'%')->where('color',$product->color)->inRandomOrder()->limit(1)->get();
            }

            $images=[];

            for($i = 2; $i < 8; $i++){

                $img = $product->image.'-'.$i.'.jpg';

                if (Storage::disk('s3')->exists('image/engagement-ring/'.$img) == true) {
                    $images[] = $img;
                }else{
                    continue;
                }

            }

            $similar = DB::table('engagement_rings')->where('style',$product->style)->where('brand',$product->brand)->inRandomOrder()->take(10)->get();

            $vid = DB::table('j_vids')->where('item_code','=',$item_code)->get();

            return view('product.product',['type'=>'engagement-ring','pairs'=>$pair,'vid'=>$vid,'shape'=>$shape,'metals'=>$metal_alternative,'product' => $product,'similar'=>$similar,'reviews' => $reviews,'ratings'=>$ratings->average('ratings'),'images'=>$images]);
        }else{
            // error
            return redirect('/engagement-ring');
        }

    }

    public function wedding_band($id){

        $product = DB::table('wedding_bands')->where('item_sku',$id)->first();

        if ($product) {

            DB::table('wedding_bands')->where('item_sku',$id)->increment("count",1);

            $item_code = $product->item_code;

            $metal = DB::table('wedding_bands')->where('item_sku','not like',$id)->where('item_code',$item_code)->orderBy('price','ASC')->get(['metal','color','item_sku','width','carat','size','thickness']);

            $m10 = $metal->where('metal','10K')->unique('color');

            $m14 = $metal->where('metal','14K')->unique('color');

            $m18 = $metal->where('metal','18K')->unique('color');

            $other = $metal->whereNotIn('metal',['10K','14K','18K'])->unique('color');

            $metal_alternative = array_merge(
                $m10->toArray(),
                $m14->toArray(),
                $m18->toArray(),
                $other->toArray()
            );

            $mm = $metal->where('size',$product->size)->where('thickness',$product->thickness)->where('metal',$product->metal)->where('color',$product->color)->where('width','!=',null)->unique('width');

            $thickness = $metal->where('width',$product->width)->where('thickness','!=',$product->thickness)->where('size',$product->size)->where('metal',$product->metal)->where('color',$product->color)->unique('thickness');

            $carats = $metal->where('color',$product->color)->where('carat','!=',null)->where('carat','!=',$product->carat)->unique('carat');

            if ($product->size) {
                $size = $metal->where('color',$product->color)->where('width',$product->width)->where('metal',$product->metal)->unique('size');;
            }else{
                $size = null;
            }

            $pair = [];

            if ($product->brand == "Verragio") {

                $r_code = substr(preg_replace('/[^0-9.]+/', '',$id),0,4);
                $pair =  DB::table('engagement_rings')->where('brand','Verragio')->where('item_sku','like','%'.$r_code.'%')->where('color',$product->color)->inRandomOrder()->limit(3)->get()->unique('item_code');
   
            }elseif($product->brand == "GabrielCo"){

                $r_code = substr(preg_replace('/[^0-9.]+/', '',$id),0,5);
                $pair =  DB::table('engagement_rings')->where('brand','GabrielCo')->where('item_sku','like','%'.$r_code.'%')->where('color',$product->color)->inRandomOrder()->limit(3)->get()->unique('item_code');

            }

            $images=[];

            for($i = 2; $i < 8; $i++){

                $img = $product->image.'-'.$i.'.jpg';

                if (Storage::disk('s3')->exists('image/wedding-band/'.$img) == true) {
                    $images[] = $img;
                }else{
                    continue;
                }

            }

            $similar = DB::table('wedding_bands')->where('style',$product->style)->where('brand',$product->brand)->inRandomOrder()->take(10)->get();

            $ratings = DB::table('ratings')->where('item_sku','=',$id)->get('ratings');

            $reviews = DB::table('users')
            ->select('name','ratings','ratings.created_at','comment')
            ->join('ratings','ratings.user_id','=','users.id')
            ->where('item_sku','=',$id)->get();

            $vid = DB::table('j_vids')->where('item_code','=',$item_code)->get();

            return view('product.product',['type'=>'wedding-band','pairs'=>$pair,'vid'=>$vid,'carats'=>$carats,'metals'=>$metal_alternative,'product' => $product,'mm'=>$mm,'thickness'=>$thickness,'similar'=>$similar,'size'=>$size,'reviews'=>$reviews,'ratings'=>$ratings->average('ratings'),'images'=>$images]);
        }else{
            // error
            return redirect('/wedding-band');
        }
    }



    public function fine_jewellery($id){

        $initials = [];

        $product = DB::table('fine_jewelleries')->where('item_sku',$id)->first();

        if ($product) {

            DB::table('fine_jewelleries')->where('item_sku',$id)->increment("count",1);

            $item_code = $product->item_code;
            
            $metal = DB::table('fine_jewelleries')->where('item_sku','not like',$id)->where('item_code',$item_code)->orderBy('color','DESC')->get(['metal','color','item_sku','carat','stone_width','item_code','main_stone','diamond_clarity','diamond_color','size']);
            
            $m10 = $metal->where('main_stone', $product->main_stone)->where('metal','10K')->unique('color');

            $m14 = $metal->where('main_stone', $product->main_stone)->where('metal','14K')->unique('color');

            $m18 = $metal->where('main_stone', $product->main_stone)->where('metal','18K')->unique('color');

            $other = $metal->where('main_stone', $product->main_stone)->whereNotIn('metal',['10K','14K','18K'])->unique('color');

            $metal_alternative = array_merge(
                $m10->toArray(),
                $m14->toArray(),
                $m18->toArray(),
                $other->toArray()
            );

            $fine_size = $metal->where('size','!=',$product->size)->where('main_stone',$product->main_stone)->unique('size');

            $stone_carat = $metal->whereNotIn('carat',[null,$product->carat])->where('main_stone', $product->main_stone)->where('color', $product->color)->where('metal', $product->metal)->where('main_stone', $product->main_stone)->where('diamond_clarity',$product->diamond_clarity)->where('diamond_color',$product->diamond_color)->unique('carat');

            $stone_mm = $metal->where('stone_width','!=',null)->where('main_stone', $product->main_stone)->where('color', $product->color)->where('metal', $product->metal)->where('main_stone', $product->main_stone)->where('diamond_clarity',$product->diamond_clarity)->where('diamond_color',$product->diamond_color)->unique('stone_width');

            $clarity = $metal->where('main_stone', $product->main_stone)->where('color', $product->color)->where('metal', $product->metal)->where('main_stone', $product->main_stone)->where('diamond_clarity','!=',$product->diamond_clarity)->where('diamond_color',$product->diamond_color)->unique('diamond_clarity');

            if (str_contains($product->item_sku,"NK4522") == true OR str_contains($product->item_sku,"NK2645") == true OR str_contains($product->item_sku,"NK4577") == true OR str_contains($product->item_sku,"NK6928") == true) {

                $stone_carat = [];
                $stone_mm = [];
                $initials =  $metal->where('main_stone', $product->main_stone)->where('color', $product->color)->where('metal', $product->metal)->where('main_stone', $product->main_stone)->sortBy('item_sku');

            }

            $other_stones = $metal->whereNotIn('main_stone',['',$product->main_stone])->unique('main_stone');

            $images=[];

            for($i = 2; $i < 8; $i++){

                $img = $product->image.'-'.$i.'.jpg';

                if (Storage::disk('s3')->exists('image/fine-jewellery/'.$img) == true) {
                    $images[] = $img;
                }else{
                    continue;
                }

            }

            $similar = DB::table('fine_jewelleries')->where('style', $product->style)->where('category', $product->category)->inRandomOrder()->take(10)->get();

            $ratings = DB::table('ratings')->where('item_sku','=',$id)->get('ratings');

            $reviews = DB::table('users')
            ->select('name','ratings','ratings.created_at','comment')
            ->join('ratings','ratings.user_id','=','users.id')
            ->where('item_sku','=',$id)->get();

            $vid = DB::table('j_vids')->where('item_code','=',$item_code)->get();
            
            return view('product.product',['type'=>'fine-jewellery','vid'=>$vid,'other_stones'=>$other_stones,'stone_carat'=> $stone_carat,'fine_size'=>$fine_size,'stone_mm'=> $stone_mm,'metals'=>$metal_alternative,'initials'=>$initials,'clarity'=>$clarity,'product' => $product,'similar'=>$similar,'reviews' => $reviews,'ratings'=>$ratings->average('ratings'),'images'=>$images]);
        }else{
            return redirect('/fine-jewellery');
        }
 
    }


    public function moissanite($id){

        $product = DB::table('moissanite')->where('item_sku',$id)->first();

        if ($product) {

        $size = DB::table('moissanite')->where('type',$product->type)->get();

        $reviews = DB::table('users')
            ->select('name','ratings','ratings.created_at','comment')
            ->join('ratings','ratings.user_id','=','users.id')
            ->where('item_sku','=',$product->item_sku)->get();

        $similar = DB::table('moissanite')->where('shape',$product->shape)->orWhere('shape','Round')->where('img_link','!=',null)->inRandomOrder()->take(10)->get();

        $ratings = DB::table('ratings')->where('item_sku','=',$id)->get('ratings');

        return view('product.stones',['type'=>'moissanite','formal_type'=>'Moissanite','product'=>$product,'similar'=>$similar,'reviews'=>$reviews,'size'=>$size,'ratings'=>$ratings->average('ratings')]);
    
        }else{
            return redirect('/moissanite');
        }

    }

    public function lab_grown($id){

        $product = DB::table('lab_grown_diamonds')->where('item_sku',$id)->first();

        if ($product) {

        $sku = $product->item_sku;

        $similar = DB::table('lab_grown_diamonds')->where('shape',$product->shape)->where('color',$product->color)->where('clarity',$product->clarity)->orWhere('shape',$product->shape)->where('img_link','!=',null)->inRandomOrder()->take(10)->get();
        return view('product.stones',['type'=>'lab-grown-diamond','formal_type'=>'Lab Grown Diamond','product'=>$product,'similar'=>$similar]);
 
        }else{
            return redirect('/lab-grown-diamond');
        }

    }

    public function diamonds($id){

        $product = DB::table('natural_diamonds')->where('item_sku',$id)->first();

        if ($product) {

        $sku = $product->item_sku;

        $similar = DB::table('natural_diamonds')->where('shape',$product->shape)->where('color',$product->color)->where('clarity',$product->clarity)->orWhere('shape',$product->shape)->where('img_link','!=',null)->inRandomOrder()->take(10)->get();
        return view('product.stones',['type'=>'diamonds','formal_type'=>'Natural Diamond','product'=>$product,'similar'=>$similar]);
 
        }else{
            return redirect('/diamonds');
        }

    }

}
