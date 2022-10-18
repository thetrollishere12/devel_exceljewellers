<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use DB;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class GoogleMerchantCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:google_merchant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


// Google MC

    $fp = fopen(storage_path()."/app/public/data/google_engagement_ring.csv", 'wb');

    $columns = array('id','item_group_id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','color','colour','category','gemstone','free_shipping_limit','material','shipping');
    fputcsv($fp,$columns);

    $db = DB::table('engagement_rings')->get();
    foreach ($db as $key) {

        $text = "";

        for($i = 2; $i < 8; $i++){

            $img = $key->image.'-'.$i.'.jpg';

            if (Storage::disk('s3')->exists('image/engagement-ring/'.$img) == true) {
                
              if ($text != "") {
                $text .= '%2C';
              }

              $text .= env('AWS_URL').'/image/engagement-ring/'.$img;

            }else{
                continue;
            }

        }

        $material = $key->metal;

        if (preg_match('#[0-9]#',$key->metal)) {
          $material .= " Gold";
        }

        if (!is_null($key->sale_price) && $key->sale_price != null) {
        
          if ($key->sale_price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }else{

          if ($key->price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }

        $columns = [$key->item_sku,$key->item_code,$key->name,$key->description,'in stock','new',$key->price." ".$key->currency,"",'https://www.exceljewellers.com/engagement-ring/'.$key->item_sku,env('AWS_URL').'/image/engagement-ring/'.$key->image.'-1.jpg',$text,$key->brand,$key->file_type.' > '.$key->style,'Apparel & Accessories > Jewelry > Rings',$key->color,$key->color,$key->file_type,'',env('FREE_SHIPPING_AMOUNT').' CAD',$material,$shipping];
        fputcsv($fp,$columns);

    }
    fclose($fp);

    $fp = fopen(storage_path()."/app/public/data/google_wedding_band.csv", 'wb');

    $columns = array('id','item_group_id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','color','colour','category','gemstone','free_shipping_limit','material','shipping');
    fputcsv($fp,$columns);

    $db = DB::table('wedding_bands')->get();
    foreach ($db as $key) {

        $text = "";

        for($i = 2; $i < 8; $i++){

            $img = $key->image.'-'.$i.'.jpg';

            if (Storage::disk('s3')->exists('image/wedding-band/'.$img) == true) {
                
              if ($text != "") {
                $text .= '%2C';
              }

              $text .= env('AWS_URL').'/image/wedding-band/'.$img;

            }else{
                continue;
            }

        }

        $material = $key->metal;

        if (preg_match('#[0-9]#',$key->metal)) {
          $material .= " Gold";
        }

        if (!is_null($key->sale_price) && $key->sale_price != null) {
        
          if ($key->sale_price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }else{

          if ($key->price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }

        $columns = [$key->item_sku,$key->item_code,$key->name,$key->description,'in stock','new',$key->price." ".$key->currency,"",'https://www.exceljewellers.com/wedding-band/'.$key->item_sku,env('AWS_URL').'/image/wedding-band/'.$key->image.'-1.jpg',$text,$key->brand,$key->file_type.' > '.$key->style,'Apparel & Accessories > Jewelry > Rings',$key->color,$key->color,$key->file_type,'',env('FREE_SHIPPING_AMOUNT').' CAD',$material,$shipping];
        fputcsv($fp,$columns);

    }
    fclose($fp);

    $fp = fopen(storage_path()."/app/public/data/google_fine_jewellery.csv", 'wb');

    $columns = array('id','item_group_id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','color','colour','category','gemstone','free_shipping_limit','material','shipping');
    fputcsv($fp,$columns);

    $db = DB::table('fine_jewelleries')->get();
    foreach ($db as $key) {

        $text = "";

        for($i = 2; $i < 8; $i++){

            $img = $key->image.'-'.$i.'.jpg';

            if (Storage::disk('s3')->exists('image/fine-jewellery/'.$img) == true) {
                
              if ($text != "") {
                $text .= '%2C';
              }

              $text .= env('AWS_URL').'/image/fine-jewellery/'.$img;

            }else{
                continue;
            }

        }

        $material = $key->metal;

        if (preg_match('#[0-9]#',$key->metal)) {
          $material .= " Gold";
        }

        if (!is_null($key->sale_price) && $key->sale_price != null) {
        
          if ($key->sale_price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }else{

          if ($key->price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }

        $columns = [$key->item_sku,$key->item_code,$key->name,$key->description,'in stock','new',$key->price." ".$key->currency,"",'https://www.exceljewellers.com/fine-jewellery/'.$key->item_sku,env('AWS_URL').'/image/fine-jewellery/'.$key->image.'-1.jpg',$text,$key->brand,$key->file_type.' > '.$key->category.' > '.$key->style,'Apparel & Accessories > Jewelry > '.$key->category,$key->color,$key->color,$key->file_type,$key->main_stone,env('FREE_SHIPPING_AMOUNT').' CAD',$material,$shipping];
        fputcsv($fp,$columns);

    }

      fclose($fp);

    $fp = fopen(storage_path()."/app/public/data/google_natural_diamond.csv", 'wb');

    $columns = array('id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','color','colour','category','gemstone','free_shipping_limit','material','shipping');
    fputcsv($fp,$columns);

    $db = DB::table('natural_diamonds')->get();
    foreach ($db as $key) {

        $text = "";

        if (isset($key->sale_price) && $key->sale_price != null) {
        
          if ($key->sale_price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }else{

          if ($key->price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }

        $columns = [$key->item_sku,$key->name,$key->description,'in stock','new',$key->price." ".$key->currency,"",'https://www.exceljewellers.com/diamonds/'.$key->item_sku,$key->img_link,$text,'Excel Jewellers',$key->file_type.' > '.$key->shape,'Apparel & Accessories > Jewelry > '.$key->file_type,$key->color,$key->color,$key->file_type,'Natural Mined Diamond',env('FREE_SHIPPING_AMOUNT').' CAD','Diamond',$shipping];
        fputcsv($fp,$columns);

    }

    fclose($fp);


    $fp = fopen(storage_path()."/app/public/data/google_lab_grown_diamond.csv", 'wb');

    $columns = array('id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','color','colour','category','gemstone','free_shipping_limit','material','shipping');
    fputcsv($fp,$columns);

    $db = DB::table('lab_grown_diamonds')->get();
    foreach ($db as $key) {

        $text = "";

        if (isset($key->sale_price) && $key->sale_price != null) {
        
          if ($key->sale_price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }else{

          if ($key->price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }

        $columns = [$key->item_sku,$key->name,$key->description,'in stock','new',$key->price." ".$key->currency,"",'https://www.exceljewellers.com/lab-grown-diamond/'.$key->item_sku,$key->img_link,$text,'Excel Jewellers',$key->file_type.' > '.$key->shape,'Apparel & Accessories > Jewelry > '.$key->file_type,$key->color,$key->color,$key->file_type,'Lab Grown Diamond',env('FREE_SHIPPING_AMOUNT').' CAD','Diamond',$shipping];
        fputcsv($fp,$columns);

    }

    fclose($fp);


    $fp = fopen(storage_path()."/app/public/data/google_moissanite.csv", 'wb');

    $columns = array('id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','color','colour','category','gemstone','free_shipping_limit','material','shipping');
    fputcsv($fp,$columns);

    $db = DB::table('moissanite')->get();
    foreach ($db as $key) {

        $text = env('AWS_URL').'image/moissanite/'.$key->img_link.'.jpg';

        if (isset($key->sale_price) && $key->sale_price != null) {
        
          if ($key->sale_price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }else{

          if ($key->price > env('FREE_SHIPPING_AMOUNT')) {
            $shipping = "CAN:0.00 CAD";
          }else{
            $shipping = "CAN:".env('SHIPPING_COST_CANADA')." CAD";
          }

        }

        $columns = [$key->item_sku,$key->name,$key->name,'in stock','new',$key->price." ".$key->currency,"",'https://www.exceljewellers.com/moissanite/'.$key->item_sku,env('AWS_URL').'/image/moissanite/'.$key->img_link.'/15.jpg',$text,'Charles & Colvard',$key->file_type.' > '.$key->shape,'Apparel & Accessories > Jewelry > '.$key->file_type,'D-E-F','D-E-F',$key->file_type,'Moissanite',env('FREE_SHIPPING_AMOUNT').' CAD','Moissanite',$shipping];
        fputcsv($fp,$columns);

    }

    fclose($fp);



    }
}
