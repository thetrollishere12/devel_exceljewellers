<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\engagement_ring;
use App\Models\wedding_band;
use App\Models\fine_jewellery;
use App\Models\CurrencyRate;
use DB;
use DOMDocument;
use DomXPath;
use File;

use Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function add_eng(){

    	return view('admin.add-eng');
    }


    public function add_jewellery(Request $request){
        return view('admin.add-jewellery');
    }


    public function jewellery_post1(Request $request){

        set_time_limit(0);

        foreach ($request['item_sku'] as $key => $product) {
       
               if ($request->item_sku[$key] != null) {

                    $eng = new fine_jewellery;
                    $eng->file_type = "fine-jewellery";
                    $eng->item_code = $request->item_code;
                    $eng->category =$request->category;
                    $eng->style =$request->style;
                    $eng->currency =$request->currency;
                    $eng->width =$request->width[$key];
                    $eng->setting_type =$request->setting_type;
                    $eng->main_stone =$request->main_stone;
                    $eng->other_stone =$request->other_stone;
                    
                    $eng->size =$request->size;
                    $eng->collection =$request->collection;
                    $eng->brand =$request->brand;


                    $eng->carat =$request->stone_carat[$key];

                    $eng->diamond_color =$request->stone_color[$key];
                    $eng->diamond_clarity =$request->stone_clarity[$key];

                    $eng->item_sku = $request->item_sku[$key];
                    $eng->name = $request->name[$key];
                    $eng->image =$request->image_name[$key];
                    $eng->image_360 =$request->image_360[$key];
                    $eng->price =$request->price[$key];
                    $eng->sale_price =$request->sale_price[$key];
                    $eng->description =$request->description[$key];
                    $eng->metal =$request->metal[$key];
                    $eng->color =$request->color[$key];
                    $eng->item_link = $request->item_link[$key];
                    $eng->quantity = 0;
                    $eng->sold = 0;
                    $eng->save();


                    if (isset($request->img1[$key])) {
                    
                        $png_url = $request->image_name[$key]."-1.jpg";

                        $path = storage_path().'/image/fine-jewellery/'. $png_url;

                        $image = $request->img1[$key];

                        $image->move(storage_path().'/image/fine-jewellery/', $png_url);

       
                        $img = Image::make($request->img1[$key]);

                        $img->resize(250,250, function ($const) {
                            $const->aspectRatio();
                        })->save('storage/image/fine-jewellery-list/'.$png_url);


  
                    }

                    if (isset($request->img2[$key])) {
                    
                        $png_url = $request->image_name[$key]."-2.jpg";

                        $path = storage_path().'/image/fine-jewellery/'. $png_url;

                        $image = $request->img2[$key];

                        $image->move(storage_path().'/image/fine-jewellery/', $png_url); 

                    }

                    if (isset($request->img3[$key])) {
                    
                        $png_url = $request->image_name[$key]."-3.jpg";

                        $path = storage_path().'/image/fine-jewellery/'. $png_url;

                        $image = $request->img3[$key];

                        $image->move(storage_path().'/image/fine-jewellery/', $png_url); 

                    }

                    if (isset($request->img4[$key])) {
                    
                        $png_url = $request->image_name[$key]."-4.jpg";

                        $path = storage_path().'/image/fine-jewellery/'. $png_url;

                        $image = $request->img4[$key];

                        $image->move(storage_path().'/image/fine-jewellery/', $png_url); 

                    }

                    if (isset($request->img5[$key])) {
                    
                        $png_url = $request->image_name[$key]."-5.jpg";

                        $path = storage_path().'/image/fine-jewellery/'. $png_url;

                        $image = $request->img5[$key];

                        $image->move(storage_path().'/image/fine-jewellery/', $png_url); 

                    }

                    if (isset($request->img6[$key])) {
                    
                        $png_url = $request->image_name[$key]."-6.jpg";

                        $path = storage_path().'/image/fine-jewellery/'. $png_url;

                        $image = $request->img6[$key];

                        $image->move(storage_path().'/image/fine-jewellery/', $png_url); 

                    }

                    if (isset($request->img7[$key])) {
                    
                        $png_url = $request->image_name[$key]."-7.jpg";

                        $path = storage_path().'/image/fine-jewellery/'. $png_url;

                        $image = $request->img7[$key];

                        $image->move(storage_path().'/image/fine-jewellery/', $png_url); 

                    }

                    if (isset($request->img8[$key])) {
                    
                        $png_url = $request->image_name[$key]."-8.jpg";

                        $path = storage_path().'/image/fine-jewellery/'. $png_url;

                        $image = $request->img8[$key];

                        $image->move(storage_path().'/image/fine-jewellery/', $png_url); 

                    }

                    if (isset($request->img9[$key])) {
                    
                        $png_url = $request->image_name[$key]."-9.jpg";

                        $path = storage_path().'/image/fine-jewellery/'. $png_url;

                        $image = $request->img9[$key];

                        $image->move(storage_path().'/image/fine-jewellery/', $png_url); 

                    }

               }

               

        }
                return back()->with('success','good');
    }

    public function remove_silver(Request $request){

        if (!$request->pass && !$request->user) {
                return "Not Authorized";
        }else{
            if ($request->pass === "sang1999" && $request->user === "admin") {
            }else{
                return "Wrong Pass";
            }
        }
            // $test1 = DB::table('fine_jewelleries')->where('name','LIKE','%silver%')->pluck('item_sku');

            $test1 = ["BG3596MXJWS"];
            foreach ($test1 as $key => $value) {
                if (file_exists('storage/image/fine-jewellery/'.$value.'-1'.'.jpg')) {
                unlink('storage/image/fine-jewellery/'.$value.'-1'.'.jpg');
                }
                if (file_exists('storage/image/fine-jewellery/'.$value.'-2'.'.jpg')) {
                unlink('storage/image/fine-jewellery/'.$value.'-2'.'.jpg');
                }
                if (file_exists('storage/image/fine-jewellery/'.$value.'-3'.'.jpg')) {
                unlink('storage/image/fine-jewellery/'.$value.'-3'.'.jpg');
                }
                if (file_exists('storage/image/fine-jewellery/'.$value.'-4'.'.jpg')) {
                unlink('storage/image/fine-jewellery/'.$value.'-4'.'.jpg');
                }
                DB::table('fine_jewelleries')->where('item_sku',$value)->delete();
            }
           
            // echo "good";
    }

    public function image_compress(){

// return 123;

        set_time_limit(0);

          // $array = ['INSIGNIA-7068CU','COUTURE-0425OV-TT','INSIGNIA-7068CU','VENETIAN-5065CU-2RW','VENETIAN-5066CU-2WR','VENETIAN-5071CU-2WR','VENETIAN-5071R-2WR','VENETIAN-5064R-2WR','VENETIAN-5070D-2RW','VENETIAN-5070D-2WR','VENETIAN-5065CU-2WR','VENETIAN-5073CU-2WR','PARISIAN-142CU'];
          //   foreach ($array as $key) {

          //       if (File::exists('storage/image/engagement-ring/'.$key.'-1.jpg')) {
          //           File::delete('storage/image/engagement-ring/'.$key.'-1.jpg');
          //       }

          //       if (File::exists('storage/image/engagement-ring/'.$key.'-2.jpg')) {
          //           File::delete('storage/image/engagement-ring/'.$key.'-2.jpg');
          //       }

          //       if (File::exists('storage/image/engagement-ring/'.$key.'-3.jpg')) {
          //           File::delete('storage/image/engagement-ring/'.$key.'-3.jpg');
          //       }

          //       if (File::exists('storage/image/engagement-ring/'.$key.'-4.jpg')) {
          //           File::delete('storage/image/engagement-ring/'.$key.'-4.jpg');
          //       }

          //       if (File::exists('storage/image/engagement-ring/'.$key.'-5.jpg')) {
          //           File::delete('storage/image/engagement-ring/'.$key.'-5.jpg');
          //       }

          //   }
          //   $specific = DB::table('engagement_rings')->whereBetween('id',[0,18829])->whereIn('item_sku',$array)->delete();

        $image = \File::allFiles('storage/image/wedding-band/');
        
        foreach ($image as $key) {

            if (strpos($key, '-1.jpg') !== false) {

            try {        

                $newname = pathinfo(basename($key),PATHINFO_FILENAME);
       
                $img = Image::make($key);

                $img->resize(250,250, function ($const) {
                    $const->aspectRatio();
                })->save('storage/image/wedding-band-list/'.basename($newname).'.jpg');


                }catch(\Exception $e){
                    echo($key);
                    echo('<br>');
                   continue;
            }


            }            
        
        }


        

        return "done";


    }



        
}
