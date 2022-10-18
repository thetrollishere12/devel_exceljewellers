<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Models\labGrownDiamond;
use DB;
use Carbon\Carbon;

class StullerLabDiamond extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:stuller_lab_diamond';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Stuller Lab Diamond';

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

        $login = 'excel';
        $password = 'Excel2000';
        $url = 'https://api.stuller.com/v2/gem';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
        $result = curl_exec($ch);

        $result1 = json_decode($result,true);

        $db = DB::table('lab_grown_diamonds')->where('company','Stuller')->pluck('item_sku');
        $new = 0;
        $up = 0;
        $del = 0;


        foreach ($result1['LabGrownDiamonds'] as $key) {

            $array[] = [
                'sku'=>$key['SerialNumber'],
                'price'=>$key['ShowcasePrice']['Value']
            ];
        }

        $collect = collect($array);

        foreach ($db->toArray() as $key) {

            $matches = $collect->where('sku',$key);
            // var_dump($match);
            if (count($matches) > 0) {
                
                foreach ($matches as $match) {
                    
                    $c_price = DB::table('lab_grown_diamonds')->where('company','Stuller')->where('item_sku', $match['sku'])->value('price');

                    if ($c_price != $match['price'] && $key == $match['sku']) {
                        
                        DB::table('lab_grown_diamonds')->where('company','Stuller')->where('item_sku', $match['sku'])->update([
                            "price"=>$match['price']
                        ]);

                        $up++;

                    }

                }

                continue;

            }else{
                DB::table('lab_grown_diamonds')->where('company','Stuller')->where('item_sku',$key)->delete();
                DB::table('favourites')->where('item_sku',$key)->delete();
                $del++;
            }

        }

        foreach ($result1['LabGrownDiamonds'] as $key) {
            if ($key['Images'] && $key['Videos']) {

                
                $test = DB::table('lab_grown_diamonds')->where('company','Stuller')->where('item_sku','=',$key['SerialNumber'])->get();

                if (count($test) > 0) {

                    continue;

                }

                if (isset($key['Make'])) {
                    $cut=ucfirst(strtolower($key['Make']));
                }else{
                    continue;
                }
                   
                if (isset($key['Polish'])) {
                    $polish=$key['Polish'];
                }else{
                    continue;
                }

                $eng = new labGrownDiamond;
                $eng->file_type = "lab-grown-diamond";
                $eng->company = "Stuller";
                $eng->item_sku = $key['SerialNumber'];
                $eng->name =  $key['CaratWeight']." CT ".ucfirst(strtolower(str_replace(['CUT','SHAPE','shape',' '],"",$key['Shape'])))." Lab Diamond";
                $eng->description = $key['CaratWeight']." CT ".$key['Clarity']." ".$key['Color']." color ".strtolower(str_replace(['CUT','SHAPE','shape',' '],"",$key['Shape']))." lab grown diamond with ".ucfirst(strtolower($cut))." cut & ".ucfirst(strtolower($polish))." polish.";
                $eng->currency = "CAD";
                $eng->price = $key['ShowcasePrice']['Value'];
                $eng->carat = $key['CaratWeight'];
                $eng->shape=ucfirst(strtolower(str_replace(['CUT','SHAPE','shape',' '],"",$key['Shape'])));
                $eng->color =$key['Color'];
                $eng->clarity =$key['Clarity'];
                $eng->cut=$cut;
                $eng->polish=$polish;
                $eng->width=$key['Width'];
                $eng->length=$key['Length'];
                $eng->MM=$key['MMSize'];
                $eng->table=$key['Table'];
                if (isset($key['CertificationNumber'])) {
                    $eng->certificate=$key['CertificationNumber'];
                }else{
                    $eng->certificate=null;
                }

                if (isset($key['CertificatePath'])) {
                    $eng->report=$key['CertificatePath'];
                }else{
                    $eng->report=null;
                }
                $eng->img_link=$key['Images'][0]["FullUrl"];
                if (isset($key['Images'][1]["FullUrl"])) {
                    $eng->img_link2=$key['Images'][1]["FullUrl"];
                }else{
                    $eng->img_link2=null;
                }
                $eng->video_link=$key['Videos'][0]["Url"];
                $eng->item_link=$key['WebAddress'];
                $eng->save();

                if ($eng->shape == "Square") {
                    $eng->update(['shape'=>'Princess']);
                }
                
                $new++;
            }
                                                   
        }

        $myfile = fopen(storage_path()."/logs/quality_check/stuller_lab_grown_diamond_log_".Carbon::now()->format('y-m-d').".txt", "a") or die("Unable to open file!");
        fwrite($myfile,"Complete - ".$new." new items was added and ".$up." items prices was updated and ".$del." items have been deleted". PHP_EOL);
        fclose($myfile);


    }
}
