<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\NaturalDiamond;
use DB;
use DOMDocument;
use DomXPath;
use Illuminate\Http\Request;
use Carbon\Carbon;



class RapnetNaturalDiamond extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:rapnet_nat_diamond';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting Diamond from Rapnet';

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

        $new = 0;
        $up = 0;
        $del = 0;
        $db = DB::table('natural_diamonds')->where('company','LIKE','%RapNet%')->pluck('item_sku');

        for ($i=1; $i < 70 ; $i++) {         

        $client = new Client();

        $jayParsedAry = [
           "request" => [
                 "header" => [
                    "username" => "twdorbniwt8an7n4m9l4gewcbfjosm", 
                    "password" => "f3MzTRlx" 
                 ], 
                 "body" => [
                       "search_type" => "White", 
                       "page_number" => "".$i."", 
                       "page_size" => "1000",
                       "sort_by"=>"price",
                       "sort_direction"=>"Asc"
                    ] 
              ] 
        ]; 

        $response = $client->request(
            'POST', /*instead of POST, you can use GET, PUT, DELETE, etc*/
            'https://technet.rapaport.com/HTTP/JSON/RetailFeed/GetDiamonds.aspx',
            [
                'headers' => ['Content-Type'=>'application/x-www-form-urlencoded'],
                'body'=>json_encode($jayParsedAry)
            ] 
        );

        $data = json_decode($response->getBody());

        if (!isset($data->response) OR !isset($data->response->body) OR !isset($data->response->body->diamonds)) {
            continue;
        }

        foreach ($data->response->body->diamonds as $key) {
            
            $price = $key->total_sales_price;

            switch(true){
                case $price <= 500:
                $price = $price*2.15;
                break;
                case $price <= 1000:
                $price = $price*2;
                break;
                case $price <= 2000:
                $price = $price*1.65;
                break;
                case $price <= 3000:
                $price = $price*1.45;
                break;
                case $price <= 4000:
                $price = $price*1.4;
                break;
                case $price <= 5000:
                $price = $price*1.35;
                break;
                case $price <= 7000:
                $price = $price*1.3;
                break;
                case $price <= 10000:
                $price = $price*1.25;
                break;
                case $price <= 15000:
                $price = $price*1.23;
                break;
                case $price <= 20000:
                $price = $price*1.22;
                break;
                case $price > 20000:
                $price = $price*1.2;
                break;
                default:
                $price = $price*2.15;
                break;
            }

            $array[] = [
                'sku'=>$key->diamond_id,
                'size'=>$key->size,
                'shape'=>$key->shape,
                'clarity'=>$key->clarity,
                'currency'=>$key->currency_code,
                'price'=>$price+150,
                'carat'=>$key->size,
                'color'=>$key->color,
                'cut'=>$key->cut,
                'polish'=>$key->polish,
                'width'=>$key->meas_width,
                'length'=>$key->meas_length,
                'table'=>$key->table_percent,
                'certificate'=>$key->cert_num,
                'report'=>$key->lab,
                'has_image'=>$key->has_image_file,
                'image'=>$key->image_file_url,
                'video_link'=>$key->video_url
            ];

        }

     }

     $collect = collect($array);

    foreach ($db->toArray() as $key) {

        $matches = $collect->where('sku',$key);
        // dd($matches);
        if (count($matches) > 0) {
            
            foreach ($matches as $match) {
                
                $c_price = DB::table('natural_diamonds')->where('company','LIKE','%RapNet%')->where('item_sku', $match['sku'])->value('price');

                if ($c_price != $match['price'] && $key == $match['sku']) {
                    
                    DB::table('natural_diamonds')->where('company','LIKE','%RapNet%')->where('item_sku', $match['sku'])->update([
                        "price"=>$match['price']
                    ]);

                    $up++;

                }

            }

        }else{
            DB::table('natural_diamonds')->where('company','LIKE','%RapNet%')->where('item_sku',$key)->delete();
            DB::table('favourites')->where('item_sku',$key)->delete();
            $del++;
        }

    }

    foreach ($collect as $key) {

        $found = DB::table('natural_diamonds')->where('company','LIKE','%RapNet%')->where('item_sku',$key['sku'])->get();

        if (count($found) > 0) {

            continue;

        }


        if ($key['video_link'] && $key['has_image'] == true) {
          
            $jayParsedAry = [
               "request" => [
                     "header" => [
                        "username" => "twdorbniwt8an7n4m9l4gewcbfjosm", 
                        "password" => "f3MzTRlx" 
                     ], 
                     "body" => [
                           "diamond_id" =>$key['sku']
                        ] 
                  ] 
            ]; 

            $response1 = $client->request(
                'POST', /*instead of POST, you can use GET, PUT, DELETE, etc*/
                'https://technet.rapaport.com/HTTP/JSON/RetailFeed/GetSingleDiamond.aspx',
                [
                    'headers' => ['Content-Type'=>'application/x-www-form-urlencoded'],
                    'body'=>json_encode($jayParsedAry)
                ] 
            );

            $data1 = json_decode($response1->getBody());

            if (!isset($data1->response->body->seller)) {
                continue;
            }

            if (str_contains($key['video_link'],'yout') OR str_contains($key['video_link'],'vimeo') OR str_contains($key['video_link'],'diacam360') OR str_contains($data1->response->body->seller->company,'DIAMANTAIRE Bvba')) {
                continue;
            }

            // if ($data1->response->body->seller->country == 'USA' OR $data1->response->body->seller->country == 'CANADA') {

                if (str_contains($key['video_link'],'Vision360')) {

                    $link = $key['video_link'];

                    parse_str($link,$param);

                    if (isset($param['sv'])) {
                        $new_link = str_replace($param['sv'],"0",$link."&btn=0");
                    }else{
                        $new_link = $key['video_link'];
                    }

                }else{

                    $new_link = $key['video_link'];

                }

                if ($key['has_image'] != true) {
                    $img = ucfirst(strtolower(str_replace(['CUT','SHAPE','shape','Modified',' '],"",$key['shape'])))."-sample.jpg";
                }else{
                    $img = $key['image'];
                }

                $eng = new NaturalDiamond;
                $eng->file_type="natural-diamond";
                $eng->company="RapNet ".$data1->response->body->seller->company;
                $eng->item_sku = $key['sku'];
                $eng->name =  $key['size']." CT ".ucfirst(strtolower(str_replace(['CUT','SHAPE','shape','Modified',' '],"",$key['shape'])))." Natural Diamond";
                $eng->description = $key['size']." CT ".$key['clarity']." ".$key['color']." color ".strtolower(str_replace(['CUT','SHAPE','shape',' '],"",$key['shape']))." natural mined diamond with ".strtolower($key['cut'])." cut & ".strtolower($key['polish'])." polish.";
                $eng->currency = $key['currency'];
                $eng->price = $key['price'];
                $eng->carat = $key['size'];
                $eng->shape=ucfirst(strtolower(str_replace(['CUT','SHAPE','shape','Modified',' '],"",$key['shape'])));
                $eng->color =$key['color'];
                $eng->clarity =$key['clarity'];
                $eng->cut=$key['cut'];
                $eng->polish=$key['polish'];
                $eng->width=$key['width'];
                $eng->length=$key['length'];
                if (ucfirst(strtolower($key['shape'])) == "Round") {
                    $eng->MM=$key['width'];
                }else{
                    $eng->MM=$key['length'].'x'.$key['width'];
                }
                $eng->table=$key['table'];
                $eng->certificate=$key['certificate'];
                if ($key['report'] == 'GIA') {
                    $eng->report='https://www.diamondselections.com/GetCertificate.aspx?diamondid='.$key['sku'].'&lab=GIA';
                }else{
                    $eng->report='https://www.diamondselections.com/GetCertificate.aspx?diamondid='.$key['sku'];
                }

                $eng->img_link=$img;
                $eng->video_link = $new_link;
                $eng->save();
                $new++;
            // }

        }
    
    }

     $myfile = fopen(storage_path()."/logs/quality_check/rapnet_natural_diamond_log_".Carbon::now()->format('y-m-d').".txt", "a") or die("Unable to open file!");
    fwrite($myfile,"Complete - ".$new." new items was added and ".$up." items prices was updated and ".$del." items have been deleted". PHP_EOL);
    fclose($myfile);


    }
}
