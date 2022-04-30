<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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
use Carbon\Carbon;

class QualityCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:quality_check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Quality Check for website';

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
        

        set_time_limit(0);


    // Image if image-1.jpg exist

      $db = DB::table('engagement_rings')->get();

      $text = "";
      $text .= "Engagement Rings";
      $text .= "\n";

      foreach ($db as $key) {
        if (!File::exists('storage/image/engagement-ring/'.$key->image.'-1.jpg')) {

          $text .= "Item SKU - ".$key->item_sku." Image - ".$key->image;
          $text .= "\n";
        }
      }

      $db = DB::table('wedding_bands')->get();

      $text .= "Wedding Bands";
      $text .= "\n";

      foreach ($db as $key) {
        if (!File::exists('storage/image/wedding-band/'.$key->image.'-1.jpg')) {
          $text .= "Item SKU - ".$key->item_sku." Image - ".$key->image;
          $text .= "\n";
        }
      }

      $db = DB::table('fine_jewelleries')->get();

      $text .= "Fine Jewellery";
      $text .= "\n";

      foreach ($db as $key) {
        if (!File::exists('storage/image/fine-jewellery/'.$key->image.'-1.jpg')) {
          $text .= "Item SKU - ".$key->item_sku." Image - ".$key->image;
          $text .= "\n";
        }
      }

    $myfile = fopen(storage_path()."/logs/quality_check/missing_image_check_".Carbon::now()->format('y-m-d').".txt", "w") or die("Unable to open file!");
    fwrite($myfile,$text);
    fclose($myfile);




    // Update nonexist 360

        $db = DB::table('engagement_rings')->get();

        $text = "";
      $text .= "Engagement Rings";
      $text .= "\n";

        foreach($db as $key){

          if ($key->image_360 != null) {

            if (!File::exists('storage/image/'.$key->file_type.'-360/'.$key->image_360.'/')) {

              $text .= "Item SKU - ".$key->item_sku." Updated to Null Image360 - ".$key->image_360;
              $text .= "\n";

              DB::table('engagement_rings')->where('id',$key->id)->update([
                "image_360"=>null
              ]);

              

            }

          }

        }

        $db = DB::table('wedding_bands')->get();

        $text .= "Wedding Bands";
      $text .= "\n";

        foreach($db as $key){

          if ($key->image_360 != null) {

            if (!File::exists('storage/image/'.$key->file_type.'-360/'.$key->image_360.'/')) {

              $text .= "Item SKU - ".$key->item_sku." Updated to Null Image360 - ".$key->image_360;
              $text .= "\n";

              DB::table('wedding_bands')->where('id',$key->id)->update([
                "image_360"=>null
              ]);

              

            }

          }

        }

        $db = DB::table('fine_jewelleries')->get();

        $text .= "Fine Jewellery";
      $text .= "\n";

        foreach($db as $key){

          if ($key->image_360 != null) {

            if (!File::exists('storage/image/'.$key->file_type.'-360/'.$key->image_360.'/')) {

              $text .= "Item SKU - ".$key->item_sku." Updated to Null Image360 - ".$key->image_360;
              $text .= "\n";

              DB::table('fine_jewelleries')->where('id',$key->id)->update([
                "image_360"=>null
              ]);

            }

          }

        }


    $myfile = fopen(storage_path()."/logs/quality_check/updated_360_".Carbon::now()->format('y-m-d').".txt", "w") or die("Unable to open file!");
    fwrite($myfile,$text);
    fclose($myfile);


    // Make Metals Uppercase

    DB::table('engagement_rings')->where("metal","10k")->update(["metal"=>"10K"]);
    DB::table('engagement_rings')->where("metal","14k")->update(["metal"=>"14K"]);
    DB::table('engagement_rings')->where("metal","18k")->update(["metal"=>"18K"]);

    DB::table('wedding_bands')->where("metal","10k")->update(["metal"=>"10K"]);
    DB::table('wedding_bands')->where("metal","14k")->update(["metal"=>"14K"]);
    DB::table('wedding_bands')->where("metal","18k")->update(["metal"=>"18K"]);

    DB::table('fine_jewelleries')->where("metal","10k")->update(["metal"=>"10K"]);
    DB::table('fine_jewelleries')->where("metal","14k")->update(["metal"=>"14K"]);
    DB::table('fine_jewelleries')->where("metal","18k")->update(["metal"=>"18K"]);

    // UPDATE engagement_rings SET metal = '10K' where metal = '10k';
    // UPDATE engagement_rings SET metal = '14K' where metal = '14k';
    // UPDATE engagement_rings SET metal = '18K' where metal = '18k';

    // UPDATE wedding_bands SET metal = '10K' where metal = '10k';
    // UPDATE wedding_bands SET metal = '14K' where metal = '14k';
    // UPDATE wedding_bands SET metal = '18K' where metal = '18k';

    // UPDATE fine_jewelleries SET metal = '10K' where metal = '10k';
    // UPDATE fine_jewelleries SET metal = '14K' where metal = '14k';
    // UPDATE fine_jewelleries SET metal = '18K' where metal = '18k';

    // Facebook Store Data Extract

    $fp = fopen(storage_path()."/logs/quality_check/online_store_engagement_ring.csv", 'wb');

    $columns = array('id','item_group_id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','material','color','colour','category','gemstone','free_shipping_limit');
    fputcsv($fp,$columns);

    $db = DB::table('engagement_rings')->get();
    foreach ($db as $key) {

        $text = "";

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-2.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-2.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-3.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-3.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-4.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-4.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-5.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-5.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-6.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-6.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-7.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-7.jpg';
        }


        $columns = [$key->item_sku,$key->item_code,$key->name,$key->description,'in stock','new',$key->price,$key->sale_price,'https://www.exceljewellers.com/engagement-ring/'.$key->item_sku,'https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-1.jpg',$text,$key->brand,$key->file_type.' > '.$key->style,'Apparel & Accessories > Jewelry > Rings',$key->metal,$key->color,$key->color,$key->file_type,'','300 CAD'];
        fputcsv($fp,$columns);

    }
    fclose($fp);

    $fp = fopen(storage_path()."/logs/quality_check/online_store_wedding_band.csv", 'wb');

    $columns = array('id','item_group_id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','material','color','colour','category','gemstone','free_shipping_limit');
    fputcsv($fp,$columns);

    $db = DB::table('wedding_bands')->get();
    foreach ($db as $key) {

        $text = "";

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-2.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-2.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-3.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-3.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-4.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-4.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-5.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-5.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-6.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-6.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-7.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-7.jpg';
        }

        $columns = [$key->item_sku,$key->item_code,$key->name,$key->description,'in stock','new',$key->price,$key->sale_price,'https://www.exceljewellers.com/wedding-band/'.$key->item_sku,'https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-1.jpg',$text,$key->brand,$key->file_type.' > '.$key->style,'Apparel & Accessories > Jewelry > Rings',$key->metal,$key->color,$key->color,$key->file_type,'','300 CAD'];
        fputcsv($fp,$columns);

    }
    fclose($fp);

    $fp = fopen(storage_path()."/logs/quality_check/online_store_fine_jewellery.csv", 'wb');

    $columns = array('id','item_group_id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','material','color','colour','category','gemstone','free_shipping_limit');
    fputcsv($fp,$columns);

    $db = DB::table('fine_jewelleries')->get();
    foreach ($db as $key) {


        $text = "";

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-2.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-2.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-3.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-3.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-4.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-4.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-5.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-5.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-6.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-6.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-7.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-7.jpg';
        }


        $columns = [$key->item_sku,$key->item_code,$key->name,$key->description,'in stock','new',$key->price,$key->sale_price,'https://www.exceljewellers.com/fine-jewellery/'.$key->item_sku,'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-1.jpg',$text,$key->brand,$key->file_type.' > '.$key->category.' > '.$key->style,'Apparel & Accessories > Jewelry > '.$key->category,$key->metal,$key->color,$key->color,$key->file_type,$key->main_stone,'300 CAD'];
        fputcsv($fp,$columns);

    }
    fclose($fp);

// Google MC

    $fp = fopen(storage_path()."/logs/quality_check/google_engagement_ring.csv", 'wb');

    $columns = array('id','item_group_id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','material','color','colour','category','gemstone','free_shipping_limit');
    fputcsv($fp,$columns);

    $db = DB::table('engagement_rings')->get();
    foreach ($db as $key) {

        $text = "";

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-2.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-2.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-3.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-3.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-4.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-4.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-5.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-5.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-6.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-6.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-7.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-7.jpg';
        }


        $columns = [$key->item_sku,$key->item_code,$key->name,$key->description,'in stock','new',$key->price." ".$key->currency,"",'https://www.exceljewellers.com/engagement-ring/'.$key->item_sku,'https://www.exceljewellers.com/storage/image/engagement-ring/'.$key->image.'-1.jpg',$text,$key->brand,$key->file_type.' > '.$key->style,'Apparel & Accessories > Jewelry > Rings',$key->metal,$key->color,$key->color,$key->file_type,'','300 CAD'];
        fputcsv($fp,$columns);

    }
    fclose($fp);

    $fp = fopen(storage_path()."/logs/quality_check/google_wedding_band.csv", 'wb');

    $columns = array('id','item_group_id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','material','color','colour','category','gemstone','free_shipping_limit');
    fputcsv($fp,$columns);

    $db = DB::table('wedding_bands')->get();
    foreach ($db as $key) {

        $text = "";

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-2.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-2.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-3.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-3.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-4.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-4.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-5.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-5.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-6.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-6.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-7.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= ',https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-7.jpg';
        }

        $columns = [$key->item_sku,$key->item_code,$key->name,$key->description,'in stock','new',$key->price." ".$key->currency,"",'https://www.exceljewellers.com/wedding-band/'.$key->item_sku,'https://www.exceljewellers.com/storage/image/wedding-band/'.$key->image.'-1.jpg',$text,$key->brand,$key->file_type.' > '.$key->style,'Apparel & Accessories > Jewelry > Rings',$key->metal,$key->color,$key->color,$key->file_type,'','300 CAD'];
        fputcsv($fp,$columns);

    }
    fclose($fp);

    $fp = fopen(storage_path()."/logs/quality_check/google_fine_jewellery.csv", 'wb');

    $columns = array('id','item_group_id','title','description','availability','condition','price','sale_price','link','image_link','additional_image_link','brand','product_type','google_product_id','material','color','colour','category','gemstone','free_shipping_limit');
    fputcsv($fp,$columns);

    $db = DB::table('fine_jewelleries')->get();
    foreach ($db as $key) {

        $text = "";

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-2.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-2.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-3.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-3.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-4.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-4.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-5.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-5.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-6.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-6.jpg';
        }

        if (File::exists('storage/image/engagement-ring/'.$key->image.'-7.jpg')) {

          if ($text != "") {
            $text .= ',';
          }

          $text .= 'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-7.jpg';
        }


        $columns = [$key->item_sku,$key->item_code,$key->name,$key->description,'in stock','new',$key->price." ".$key->currency,"",'https://www.exceljewellers.com/fine-jewellery/'.$key->item_sku,'https://www.exceljewellers.com/storage/image/fine-jewellery/'.$key->image.'-1.jpg',$text,$key->brand,$key->file_type.' > '.$key->category.' > '.$key->style,'Apparel & Accessories > Jewelry > '.$key->category,$key->metal,$key->color,$key->color,$key->file_type,$key->main_stone,'300 CAD'];
        fputcsv($fp,$columns);

    }

      fclose($fp);

      DB::table('fine_jewelleries')->where('item_sku','PK1144-C')->delete();
      DB::table('fine_jewelleries')->where('item_sku','PK1144-A')->delete();
      DB::table('fine_jewelleries')->where('item_sku','PK1144-B')->delete();
      DB::table('fine_jewelleries')->where('item_sku','PK1144-D')->delete();
      DB::table('fine_jewelleries')->where('item_sku','PK1167BOX')->delete();
      DB::table('fine_jewelleries')->where('item_sku','PK1167DISP')->delete();
      DB::table('fine_jewelleries')->where('item_sku','TRAVELCASE')->delete();
      DB::table('fine_jewelleries')->where('item_sku','NK7039-18SVJJJ')->delete();


      DB::table('engagement_rings')->where('item_sku','ER11755S8Y44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER11755O8Y44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER11755E8Y44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER13883R3K44JJ')->delete();


      DB::table('engagement_rings')->where('item_sku','ER13883R3Y44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER11755S8W44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER11755O8W44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER11755E8W44JJ')->delete();



      DB::table('engagement_rings')->where('item_sku','ER6002S4W44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER6002P6W44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER13883R3W44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER12662S3K44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER11755S8K44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER11755E8K44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER11755O8K44JJ')->delete();


      DB::table('engagement_rings')->where('item_sku','ER6002E4W44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER12277M6W44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER12277S3W44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER12277O8W44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER12953M4W44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER7995M44JJ')->delete();
      DB::table('engagement_rings')->where('item_sku','ER6660W44JJ')->delete();

      DB::table('wedding_bands')->where('item_sku','WB13986R6W83JJ')->delete();
      DB::table('wedding_bands')->where('item_sku','WB14022S3W44JJ')->delete();


    }
}
