<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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

class ImageCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:image_check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update images, delete and compresses them';

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

        $image = \File::allFiles('storage/image/engagement-ring/');

        foreach ($image as $key) {
          $imgs= str_replace(['-1.jpg','-2.jpg','-3.jpg','-4.jpg','-5.jpg','-6.jpg','-7.jpg','-8.jpg','-9.jpg'],'',basename($key));
          $count = DB::table('engagement_rings')->where('image',$imgs)->get();

          if (count($count)>0) {
            continue;
          }else{
            File::delete($key);
            File::delete('storage/image/engagement-ring-list/'.basename($key));
            
            $myfile = fopen(storage_path()."/logs/quality_check/image_delete_log_eng_".Carbon::now()->format('y-m-d').".txt", "a") or die("Unable to open file!");
            fwrite($myfile,"Deleted Engagement-Ring Image - ".$key. PHP_EOL);
            fclose($myfile);

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
            
            $myfile = fopen(storage_path()."/logs/quality_check/image_delete_log_wed_".Carbon::now()->format('y-m-d').".txt", "a") or die("Unable to open file!");
            fwrite($myfile,"Deleted wedding-band Image - ".$key. PHP_EOL);
            fclose($myfile);

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
            
            $myfile = fopen(storage_path()."/logs/quality_check/image_delete_log_fine_jewellery_".Carbon::now()->format('y-m-d').".txt", "a") or die("Unable to open file!");
            fwrite($myfile,"Deleted Fine-Jewellery Image - ".$key. PHP_EOL);
            fclose($myfile);

          }

        }



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

              $myfile = fopen(storage_path()."/logs/quality_check/image_compress_log_".Carbon::now()->format('y-m-d').".txt", "a") or die("Unable to open file!");
                fwrite($myfile,"Compress Engagement-Ring Image Issue - ".$key. PHP_EOL);
                fclose($myfile);
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

              $myfile = fopen(storage_path()."/logs/quality_check/image_compress_log_".Carbon::now()->format('y-m-d').".txt", "a") or die("Unable to open file!");
                fwrite($myfile,"Compress wedding-band Image Issue - ".$key. PHP_EOL);
                fclose($myfile);
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

              $myfile = fopen(storage_path()."/logs/quality_check/image_compress_log_".Carbon::now()->format('y-m-d').".txt", "a") or die("Unable to open file!");
                fwrite($myfile,"Compress Fine-Jewellery Image Issue - ".$key. PHP_EOL);
                fclose($myfile);
             continue;

          }

          }            
      
      }

    }
}
