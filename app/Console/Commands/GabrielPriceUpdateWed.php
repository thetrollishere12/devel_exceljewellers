<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use DB;
use Carbon\Carbon;

class GabrielPriceUpdateWed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:gab_price_update_wed';

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

        $db = DB::table('wedding_bands')->where('brand','GabrielCo')->get();

        $text = "";
        $text .= "Wedding Bands";
        $text .= "\n";

        foreach ($db as $key) {
        
            $crawler = $client->request('GET', $key->item_link);

            try{

                $crawler->filter('.hidden-sm-up .box_span.pb3 .price')->each(function($node) use (&$text,$key) {

                    $scrap_price = str_replace(',','',trim($node->text(),'CAD '));

                    if ($scrap_price > $key->price) {

                        $db = DB::table('wedding_bands')->where('brand','GabrielCo')->where('id',$key->id)->update([
                            'price'=>intval($scrap_price)
                        ]);

                        $text .= $key->price.' turned into '.intval($scrap_price)." for product ID ".$key->id;
                        $text .= "\n";

                    }

                });

            }catch(Exception $e){

                continue;

            }


        }

        $myfile = fopen(storage_path()."/logs/quality_check/gabriel_wed_update_".Carbon::now()->format('y-m-d').".txt", "w") or die("Unable to open file!");
        fwrite($myfile,$text);
        fclose($myfile);
        
    }
}
