<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class StullerEngagementPriceUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:stuller_price_update_eng';

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

  

        set_time_limit(0);

        $db = DB::table('engagement_rings')->where('brand','Excel-S')->get();

        foreach ($db as $product) {

            $response = Http::withBasicAuth('excel','Excel2000')
            ->asForm()
            ->get('https://api.stuller.com/v2/products',[
                'sku'=>$product->item_sku
            ]);

            $result1 = json_decode($response,true);

            if (!isset($result1['Products'][0]['ShowcasePrice']['Value'])) {
                continue;
            }

            $scrap_price = $result1['Products'][0]['ShowcasePrice']['Value'];
            
            if ($product->price != $scrap_price) {
                
                DB::table('engagement_rings')->where('brand','Excel-S')->where('item_sku',$product->item_sku)->update([
                    "price"=>$scrap_price
                ]);

                echo($product->price." to ".$scrap_price." For ".$product->item_sku);

            }

        }

    }
}
