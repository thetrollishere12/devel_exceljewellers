<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use DB;
use Carbon\Carbon;

class VerragioPriceUpdateEng extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:verragio_price_update_eng';

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

        $client = new Client();

        $db = DB::table('engagement_rings')->where('brand','Verragio')->where('item_link','LIKE','%-engagement-rings%')->get();

        $text = "";
        $text .= "Engagement Rings";
        $text .= "\n";

        foreach ($db as $key) {
        
            $crawler = $client->request('GET', $key->item_link);

            try{

                $crawler->filter('#metal-purity-'.strtolower($key->metal))->each(function($node) use (&$text,$key) {

                    $scrap_price = $node->attr('data-price-'.strtolower($key->color));

                    if ($key->color == "WhiteRose") {
                        $scrap_price = $node->attr('data-price-two-tone');
                    }

                    if ($scrap_price > $key->price) {
                    
                    $db = DB::table('engagement_rings')->where('brand','Verragio')->where('id',$key->id)->update([
                        'price'=>intval($scrap_price)
                    ]);
             
                    $text .= $key->price.' turned into '.intval($scrap_price)." for product ID ".$key->id.' - SKU - '.$key->item_sku;
                    $text .= "\n";

                    }

                });

            }catch(Exception $e){

                continue;

            }

        }

        $myfile = fopen(storage_path()."/logs/quality_check/verragio_eng_update_".Carbon::now()->format('y-m-d').".txt", "w") or die("Unable to open file!");
        fwrite($myfile,$text);
        fclose($myfile);



    }
}
