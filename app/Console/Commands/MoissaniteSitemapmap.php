<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;
use DB;

class MoissaniteSitemapmap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:moissanite_sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Sitemap For Moissanite';

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
    
        $db = DB::table('moissanite')->get();

        $sitemap = Sitemap::create();

        foreach ($db as $product) {
            $sitemap->add(Url::create('/moissanite/'.$product->item_sku)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.7));
        }

        $sitemap->writeToDisk('public', 'sitemap/moissanite_sitemap.xml');


    }
}
