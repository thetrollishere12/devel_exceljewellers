<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\fine_jewellery;
use App\Models\wedding_band;
use App\Models\engagement_ring;
use Storage;
use Intervention\Image\Facades\Image;
use DOMDocument;
use DomXPath;
use File;

class AdminPanelController extends Controller
{
    
	public function excel_view(){
		return view('admin.add-excel');
	}


  public function eng_post1(Request $request){

        set_time_limit(0);

        foreach ($request['item_sku'] as $key => $product) {
       
               if ($request->item_sku[$key] != null) {

                    $eng = new engagement_ring;
                    $eng->file_type = "engagement-ring";
                    $eng->item_code = $request->item_code;
                    $eng->style =$request->style;
                    $eng->currency =$request->currency;
                    $eng->width =$request->width[$key];
                    $eng->setting_type =$request->setting_type;
                    
                    $eng->collection =$request->collection;
                    $eng->brand =$request->brand;


                    $eng->carat =$request->stone_carat[$key];
                    $eng->stoneshape= $request->stoneshape[$key];
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

  public function excel_insert_stuller(Request $request){

    set_time_limit(0);
    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));
    $login = 'excel';
    $password = 'Excel2000';

    foreach ($data as $key => $value) {

        if ($value[0] == null) {
          continue;
        }

        $find = DB::table('engagement_rings')->where('item_sku',$value[2])->get();

        if (count($find)>0) {

          $url = 'https://api.stuller.com/v2/products?SKU='.$value[2];
          $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL,$url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
          curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
          curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
          $result = curl_exec($ch);

          $result1 = json_decode($result,true);

          foreach ($result1['Products'] as $key) {
              DB::table('engagement_rings')->where('brand','Excel')->where('item_sku',$value[2])->update([
              'price'=>intval(str_replace(",","",$key['ShowcasePrice']['Value']))
            ]);
          }


        }else{

            if($value[0] != 'engagement-ring' OR $value[13] == 'Silver'){
              continue;
            }

            $eng = new engagement_ring;
            $eng->file_type = $value[0];
            $eng->item_code = $value[1];
            $eng->item_sku = $value[2];
            $eng->style =str_replace("-style","",ucfirst(strtolower($value[3])));
            if ($value[13] == "Platinum" && $value[14] == "Platinum") {
              $eng->name = $value[14]." ".$value[10]." ".str_replace("-style","",ucfirst(strtolower($value[3])))." Engagement Ring";
            }else{
              $eng->name = $value[13]." ".$value[14]." ".$value[10]." ".str_replace("-style","",ucfirst(strtolower($value[3])))." Engagement Ring";
            }
            $eng->image = str_replace(["Platinum","Palladium","PLATINUM"],"W",$value[5]);
            $eng->image_360 =str_replace(["Platinum","Palladium","PLATINUM"],"W",$value[6]);
            $eng->currency =$value[7];
            $eng->price =intval(str_replace(",","",$value[8]));

            $url = 'https://api.stuller.com/v2/products?SKU='.$value[2];
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
            $result = curl_exec($ch);

            $result1 = json_decode($result,true);

            foreach ($result1['Products'] as $key) {
                $eng->price =intval(str_replace(",","",$key['ShowcasePrice']['Value']));
            }

            $eng->sale_price =null;
            $eng->stoneshape =$value[10];

            if ($value[13] == "Platinum" && $value[14] == "Platinum") {
              $eng->description = $value[14]." ".$value[10]." ".str_replace("-style","",ucfirst(strtolower($value[3])))." Engagement Ring";
            }else{
              $eng->description = $value[13]." ".$value[14]." ".$value[10]." ".str_replace("-style","",ucfirst(strtolower($value[3])))." Engagement Ring";
            }

            $eng->collection =$value[12];
            $eng->metal =$value[13];
            $eng->color =str_replace("-","",$value[14]);
            $eng->width =null;
            $eng->setting_type ="";
            $eng->carat =null;
            $eng->brand ="Excel-S";
            $eng->item_link = $value[19];
            $eng->quantity = 0;
            $eng->sold = 0;
            $eng->save();      
            

        }

    }

    $product = DB::table('engagement_rings')->where('color','Palladium')->where('brand','Excel-S')->get();

    foreach ($product as $key => $value) {
        $code = str_replace("-EX","",$value->item_code);

        $new_name = str_replace($code."-P-",$code."-W-",$value->image);

        DB::table('engagement_rings')->where('color','Palladium')->where('brand','Excel-S')->where('id',$value->id)->update([
            "image"=> $new_name,
            "image_360"=> $new_name
        ]);
    }


  }

	public function excel_insert(Request $request){
		set_time_limit(0);
		$path = $request->file('csv_file')->getRealPath();
		$data = array_map('str_getcsv', file($path));

		// dd($data);

    if ($request->type == "eng") {
      
      foreach ($data as $key => $value) {

          $find = DB::table('engagement_rings')->where('item_sku',$value[1])->get();

          if (count($find)>0) {
            echo($value[1]);
            echo('<br>');
            DB::table('engagement_rings')->where('brand','GabrielCo')->where('item_sku',$value[1])->update([
              'price'=>intval(str_replace(",","",$value[8]))
            ]);
          }else{

              if($value[0] != 'engagement-ring'){
                continue;
              }

              $eng = new engagement_ring;
                        $eng->file_type = $value[0];
                        $eng->item_code = $value[2];
                        $eng->item_sku = $value[1];
                        $eng->style =ucfirst(strtolower($value[3]));
                        $eng->name = $value[4];
                        $eng->image = $value[23];
                        $eng->image_360 =null;
                        $eng->currency =$value[7];
                        $eng->price =intval(str_replace(",","",$value[8]));
                        $eng->sale_price =null;
                        $eng->stoneshape =$value[11];
                        $eng->description =$value[12];
                        $eng->collection =$value[13];
                        $eng->metal =$value[14];
                        $eng->color =str_replace("-","",$value[15]);
                        $eng->width =str_replace("mm","",$value[16]);
                        $eng->setting_type =$value[17];
                        $eng->carat =$value[18];
                        $eng->brand =$value[19];
                        $eng->item_link = $value[20];
                        $eng->quantity = 0;
                        $eng->sold = 0;
                        $eng->save();      
                        

          }

      }


    }elseif($request->type == "wed"){
      

      foreach ($data as $key => $value) {

        $find = DB::table('wedding_bands')->where('item_sku',$value[1])->get();

        if (count($find)>0) {
          echo($value[1]);
          echo('<br>');
          DB::table('wedding_bands')->where('brand','GabrielCo')->where('item_sku',$value[1])->update([
            'price'=>intval(str_replace(",","",$value[8]))
          ]);
        }else{

            if($value[0] != 'wedding-band'){
              continue;
            }

            $eng = new wedding_band;
                      $eng->file_type = $value[0];
                      $eng->item_code=$value[2];
                      $eng->item_sku=$value[1];
                      $eng->style=ucfirst(strtolower($value[3]));
                      $eng->name=str_replace('��','e',$value[4]);
                      $eng->image=$value[23];
                      $eng->image_360=null;
                      $eng->currency=$value[7];
                      $eng->price=intval(str_replace(",","",$value[8]));
                      $eng->sale_price=null;
                      $eng->description=$value[12];
                      $eng->collection=$value[13];
                      $eng->metal=$value[14];
                      $eng->color=str_replace("-","",$value[15]);
                      $eng->width =str_replace("mm","",$value[16]);
                      $eng->thickness=null;
                      $eng->size=null;
                      $eng->carat=$value[18];
                      $eng->brand=$value[19];
                      $eng->item_link=$value[20];
                      $eng->quantity = 0;
                      $eng->sold = 0;
                      $eng->save();


        }

      }

    DB::table('wedding_bands')->where('item_sku','MBE0901-70TIJJJ')->update([
      'color'=>'Titanium',
      'metal'=>'Titanium'
    ]);

    DB::table('wedding_bands')->where('item_sku','WB5823W44JJ')->delete();

    }elseif($request->type == "fine"){
      

      foreach ($data as $key => $value) {

        $find = DB::table('fine_jewelleries')->where('item_sku',$value[1])->get();

        if (count($find)>0) {
          echo($value[1]);
          echo('<br>');
          DB::table('fine_jewelleries')->where('brand','GabrielCo')->where('item_sku',$value[1])->update([
            'price'=>intval(str_replace(",","",$value[8]))
          ]);
        }else{

            if($value[0] != 'fine-jewellery'){
              continue;
            }

            $eng = new fine_jewellery;
                      $eng->file_type = $value[0];
                      $eng->item_code = $value[2];
                      $eng->category =$value[5];
                      $eng->style =ucfirst(strtolower($value[3]));
                      $eng->currency =$value[7];
                      $eng->width =str_replace("mm","",$value[16]);
                      $eng->setting_type =$value[17];
                      $eng->main_stone =$value[24];
                      $eng->other_stone =$value[25];
                      $eng->carat =$value[18];
                      if ($value[3] != "Ring") {
                        if (empty($value[10])) {
                          $eng->size =null;
                        }else{
                          $eng->size =$value[10];
                        }
                        
                      }else{
                        $eng->size = null;
                      }
                      
                      $eng->collection =$value[13];
                      $eng->brand =$value[19];

                      $eng->item_sku = $value[1];
                      $eng->name = $value[4];
                      $eng->image = $value[23];
                      $eng->image_360 =null;
                      $eng->price =intval(str_replace(",","",$value[8]));
                      $eng->sale_price =null;
                      $eng->description =$value[12];
                      $eng->metal =$value[14];
                      $eng->color =str_replace("-","",$value[15]);
                      $eng->item_link = $value[20];
                      $eng->quantity = 0;
                      $eng->sold = 0;
                      $eng->save();


        }

      }

      DB::table('fine_jewelleries')->where('item_sku','EG14012Y4JJJ')->update([
            'main_stone'=>null,
            'carat'=>null
        ]);

      DB::table('fine_jewelleries')->where('item_sku','EG9682Y45EA')->update([
            'color'=>'Yellow'
        ]);

      DB::table('fine_jewelleries')->where('item_sku','BG4475-65Y4JLP')->update([
            'main_stone'=>'lapis'
        ]);

      DB::table('fine_jewelleries')->where('item_sku','EG14406SVJJJ')->update([
            'main_stone'=>null,
            'carat'=>null
        ]);
      DB::table('fine_jewelleries')->where('item_sku','PK1144-C')->delete();
      DB::table('fine_jewelleries')->where('item_sku','PK1144-A')->delete();
      DB::table('fine_jewelleries')->where('item_sku','PK1144-B')->delete();
      DB::table('fine_jewelleries')->where('item_sku','PK1144-D')->delete();
      DB::table('fine_jewelleries')->where('item_sku','PK1167BOX')->delete();
      DB::table('fine_jewelleries')->where('item_sku','TRAVELCASE')->delete();

    }else{
      return "error";
    }

	}

  public  function image_to_list(){

    set_time_limit(0);

    $image = \File::allFiles('storage/image/engagement-ring/');
      
      foreach ($image as $key) {

          if (strpos($key, '-1.jpg') !== false) {

          try {        

              $newname = pathinfo(basename($key),PATHINFO_FILENAME);
              $img = Image::make($key);
              $img->resize(250,250, function ($const) {
                  $const->aspectRatio();
              })->save('storage/image/engagement-ring-list/'.basename($newname).'.jpg');

          }catch(\Exception $e){

              echo($key);
              echo('<br>');
             continue;

          }

          }            
      
      }

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

      $image = \File::allFiles('storage/image/fine-jewellery/');
      
      foreach ($image as $key) {

          if (strpos($key, '-1.jpg') !== false) {

          try {        

              $newname = pathinfo(basename($key),PATHINFO_FILENAME);
              $img = Image::make($key);
              $img->resize(250,250, function ($const) {
                  $const->aspectRatio();
              })->save('storage/image/fine-jewellery-list/'.basename($newname).'.jpg');

          }catch(\Exception $e){

              echo($key);
              echo('<br>');
             continue;

          }

          }            
      
      }

      return "done";

  }

  public function image_cleanup(){

    set_time_limit(0);

    $image = \File::allFiles('storage/image/engagement-ring/');

    foreach ($image as $key) {
      $imgs= str_replace(['-1.jpg','-2.jpg','-3.jpg','-4.jpg','-5.jpg','-6.jpg','-7.jpg','-8.jpg','-9.jpg'],'',basename($key));
      $count = DB::table('engagement_rings')->where('image',$imgs)->get();

      if (count($count)>0) {
        continue;
      }else{
        File::delete($key);
        File::delete('storage/image/engagement-ring-list/'.basename($key));
        echo($key);
        echo('<br>');
      }

    }

    $image = \File::allFiles('storage/image/wedding-band/');

    foreach ($image as $key) {
      $imgs= str_replace(['-1.jpg','-2.jpg','-3.jpg','-4.jpg','-5.jpg','-6.jpg','-7.jpg','-8.jpg','-9.jpg'],'',basename($key));
      $count = DB::table('wedding_bands')->where('image',$imgs)->get();

      if (count($count)>0) {
        continue;
      }else{
        File::delete($key);
        File::delete('storage/image/wedding-band-list/'.basename($key));
        echo($key);
        echo('<br>');
      }

    }

    $image = \File::allFiles('storage/image/fine-jewellery/');

    foreach ($image as $key) {
      $imgs= str_replace(['-1.jpg','-2.jpg','-3.jpg','-4.jpg','-5.jpg','-6.jpg','-7.jpg','-8.jpg','-9.jpg'],'',basename($key));
      $count = DB::table('fine_jewelleries')->where('image',$imgs)->get();

      if (count($count)>0) {
        continue;
      }else{
        File::delete($key);
        File::delete('storage/image/fine-jewellery-list/'.basename($key));
        echo($key);
        echo('<br>');
      }

    }

    return "done";

  }

  public function test(){
    return view('admin.diamond');
  }

  public function upload_360_view(){
    return view('admin.add-360');
  }

  public function upload_video_to_360(Request $request){

    set_time_limit(0);

    $validated = $request->validate([
        'file' => 'required|file|mimes:mp4,flv,webm,mkv,vob,ogv,ogg,avi,wmv,mov,mpeg,mpg,qt',
        'folder_name' => 'required|string|alpha_num',
        'fps' => 'required|numeric',
        'qscale' => 'required|numeric|min:2|max:31'
    ]);

    // $tempFilePath = $request->file('file')->store($request->file_type."-360/".$validated['folder_name']);

    $tempFilePath = $request->file('file')->move(storage_path().'/image/'.$request->file_type.'-360/'.$validated['folder_name'], $validated['folder_name'].'.mp4');

    $framesPath = storage_path().'/image/'.$request->file_type.'-360/'.$validated['folder_name'].str_replace('.mp4','',"/%d.jpg");

    $cmd = base_path()."/ffmpeg/bin/ffmpeg -i $tempFilePath -qscale:v 2 -vf fps=1/.1 $framesPath 2>&1";

    $outputLog = array();

    exec($cmd, $outputLog, $returnCode);

    File::delete($tempFilePath);

    foreach ($request->checked as $key) {
        $sku = explode(':',$key);

      if ($sku[0] == 'fine-jewellery') {
        DB::table('fine_jewelleries')->where('item_sku','like','%'.$sku[1].'%')->update(['image_360'=>$request->folder_name]);
      }elseif($sku[0] == 'wedding-band'){
        DB::table('wedding_bands')->where('item_sku','like','%'.$sku[1].'%')->update(['image_360'=>$request->folder_name]);
      }elseif($sku[0] == 'engagement-ring'){
        DB::table('engagement_rings')->where('item_sku','like','%'.$sku[1].'%')->update(['image_360'=>$request->folder_name]);
      }

    }

    return redirect()->back()->with('success', 'Frames created successfully!');


  }


  public function turn_video_to_360(){
    set_time_limit(0);
    $video = \File::allFiles('storage/app/video_convert_360');

    foreach ($video as $key) {
      if (str_contains($key,'.mp4')) {

        $name = str_replace(['PLATINUM','SILVER','PALLADIUM'],'W',basename($key));

        Storage::disk('local')->makeDirectory("engagement-ring-360/".str_replace('.mp4','',$name));
        $inputFile = base_path().'/'.$key;
        $framesPath = base_path()."/storage/app/engagement-ring-360/".str_replace('.mp4','',$name)."/%d.jpg";

        $folder_path = base_path()."/storage/app/engagement-ring-360/".str_replace('.mp4','',$name);

        echo($inputFile);
        echo('<br>');
        echo($framesPath);
        // dd(123);
        $cmd = base_path()."/ffmpeg/bin/ffmpeg -i $inputFile -qscale:v 2 -vf fps=1/.1 $framesPath 2>&1";

        $outputLog = array();
        exec($cmd, $outputLog, $returnCode);

        // create thumbnail
        File::copy(base_path()."/storage/app/engagement-ring-360/".str_replace('.mp4','',$name."/16.jpg"),base_path()."/storage/app/engagement-ring/".str_replace('.mp4','',$name."-1.jpg"));
        File::copy(base_path()."/storage/app/engagement-ring-360/".str_replace('.mp4','',$name."/48.jpg"),base_path()."/storage/app/engagement-ring/".str_replace('.mp4','',$name."-2.jpg"));
        File::copy(base_path()."/storage/app/engagement-ring-360/".str_replace('.mp4','',$name."/82.jpg"),base_path()."/storage/app/engagement-ring/".str_replace('.mp4','',$name."-3.jpg"));
        File::copy(base_path()."/storage/app/engagement-ring-360/".str_replace('.mp4','',$name."/70.jpg"),base_path()."/storage/app/engagement-ring/".str_replace('.mp4','',$name."-4.jpg"));
        // 

        // for ($i=1; $i < 13; $i++) { 
        //   File::delete(str_replace(".mp4","",$folder_path."/".$i.".jpg"));
        // }

        // for ($i=189; $i < 200; $i++) { 
        //   File::delete(str_replace(".mp4","",$folder_path."/".$i.".jpg"));
        // }

        $image = \File::allFiles($folder_path);

        $img = [];

        foreach ($image as $key3) {

          $img[] = ["name"=>(int)basename($key3)];
          // echo(basename($key));
          // rename($key, newname)
        }

        $img_list = collect($img)->sortBy('name');

        $t = 1;

        foreach ($img_list as $key2 => $value) {
          rename($folder_path.'/'.$value['name'].".jpg",$folder_path.'/'.$t.".jpg");
          $t++;
        }

        // file::delete($key);

      }else{
        continue;
      }
      // break;
    }
  }

  public function search_data_360(Request $request){
      if ($request->ajax()) {
          
          $search =  str_replace('+', ' ', $request->search);

          if ($request->type == 'engagement-ring') {
            
            $product = DB::table('engagement_rings')
              ->where('color','LIKE',"%$search%")
              ->orWhere('style','LIKE',"%$search%")
              ->orWhere('item_sku','LIKE',"%$search%")
              ->orWhere('metal','LIKE',"%$search%")
              ->orWhere('brand','LIKE',"%$search%")
              ->orWhere('collection','LIKE',"%$search%")
              ->orWhere('name','LIKE',"%$search%")->get();

            return $product;

          }elseif($request->type == 'wedding-band'){

            $product = DB::table('wedding_bands')
              ->where('color','LIKE',"%$search%")
              ->orWhere('style','LIKE',"%$search%")
              ->orWhere('item_sku','LIKE',"%$search%")
              ->orWhere('metal','LIKE',"%$search%")
              ->orWhere('brand','LIKE',"%$search%")
              ->orWhere('collection','LIKE',"%$search%")
              ->orWhere('name','LIKE',"%$search%")->get();

              return $product;

          }elseif($request->type == 'fine-jewellery'){

            $product = DB::table('fine_jewelleries')
              ->where('color','LIKE',"%$search%")
              ->orWhere('style','LIKE',"%$search%")
              ->orWhere('item_sku','LIKE',"%$search%")
              ->orWhere('metal','LIKE',"%$search%")
              ->orWhere('brand','LIKE',"%$search%")
              ->orWhere('collection','LIKE',"%$search%")
              ->orWhere('name','LIKE',"%$search%")->get();

              return $product;

          }

      }

  }

  public function change_360_data(){
    set_time_limit(0);

    $directories = array_map('basename', File::directories('storage/image/engagement-ring-360-new'));
    
    foreach ($directories as $key) {

      $found = DB::table('engagement_rings')->where('item_sku',$key)->update([
        "image_360"=>$key
      ]);

    }

    $directories = array_map('basename', File::directories('storage/image/fine-jewellery-360-new'));
    
    foreach ($directories as $key) {

      $found = DB::table('fine_jewelleries')->where('item_sku',$key)->update([
        "image_360"=>$key
      ]);

    }

    $directories = array_map('basename', File::directories('storage/image/wedding-band-360-new'));
    
    foreach ($directories as $key) {

      $found = DB::table('wedding_bands')->where('item_sku',$key)->update([
        "image_360"=>$key
      ]);

    }


  }

  public function make_360_folder_uppercase(){

    set_time_limit(0);

    $directories = array_map('basename', File::directories('storage/image/engagement-ring-360'));

    foreach ($directories as $key) {

      rename(storage_path()."/image/engagement-ring-360/".$key,storage_path()."/image/engagement-ring-360/".strtoupper($key));

    }

    $directories = array_map('basename', File::directories('storage/image/wedding-band-360'));

    foreach ($directories as $key) {

      rename(storage_path()."/image/wedding-band-360/".$key,storage_path()."/image/wedding-band-360/".strtoupper($key));

    }

    $directories = array_map('basename', File::directories('storage/image/fine-jewellery-360'));

    foreach ($directories as $key) {

      rename(storage_path()."/image/fine-jewellery-360/".$key,storage_path()."/image/fine-jewellery-360/".strtoupper($key));

    }

  }

  public function gabriel_convert_similar_360(){

    set_time_limit(0);

    $engagement = DB::table('engagement_rings')->where('brand','GabrielCo');

    $unique = $engagement->get()->unique('item_code')->pluck('item_sku');

    $engagement = DB::table('engagement_rings')->where('brand','GabrielCo')->whereIn('item_sku',$unique)->orderBy('image_360','DESC')->get();

    foreach ($engagement as $key => $value) {

        $other_metal_color = DB::table('engagement_rings')->where('item_code',$value->item_code)->where('brand','GabrielCo')->where('image_360',null)->where('item_sku','!=',$value->item_sku)->where('stoneshape',$value->stoneshape)->orderBy('price','ASC')->orderBy('color','DESC')->update([
          "image_360"=>$value->image_360
        ]);

    }

    $wedding_bands = DB::table('wedding_bands')->where('brand','GabrielCo');

    $unique = $wedding_bands->get()->unique('item_code')->pluck('item_sku');

    $wedding_bands = DB::table('wedding_bands')->where('brand','GabrielCo')->whereIn('item_sku',$unique)->orderBy('image_360','DESC')->get();

    foreach ($wedding_bands as $key => $value) {

        $other_metal_color = DB::table('wedding_bands')->where('item_code',$value->item_code)->where('brand','GabrielCo')->where('image_360',null)->where('item_sku','!=',$value->item_sku)->orderBy('price','ASC')->orderBy('color','DESC')->orderBy('color','DESC')->update([
          "image_360"=>$value->image_360
        ]);

    }


    $fine_jewellery = DB::table('fine_jewelleries')->where('brand','GabrielCo');

    $unique = $fine_jewellery->get()->unique('item_code')->pluck('item_sku');

    $fine_jewellery = DB::table('fine_jewelleries')->where('brand','GabrielCo')->whereIn('item_sku',$unique)->orderBy('image_360','DESC')->get();

    foreach ($fine_jewellery as $key => $value) {

        $other_metal_color = DB::table('fine_jewelleries')->where('item_code',$value->item_code)->where('brand','GabrielCo')->where('image_360',null)->where('main_stone',$value->main_stone)->where('item_sku','!=',$value->item_sku)->orderBy('color','DESC')->update([
          "image_360"=>$value->image_360
        ]);

    }

  }

  public function update_gabriel_by_link(){
        // $link = "https://www.gabrielny.ca/engagement-ring/er14468r4m44jj";

        // $data = file_get_contents($link);

        //  preg_match('/<span class="price">([^<]+)<\/span>/i', $data, $price);
        //  dd(preg_replace("/[^\d.]/", "", $price[0]));
  }

}
