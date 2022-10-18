<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;
use DB;

class EngSitemapmap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:engagement_sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Sitemap For Engagement Rings';

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
        
        $db = DB::table('engagement_rings')->get();

        $sitemap = Sitemap::create();

        foreach ($db as $product) {
            $sitemap->add(Url::create('/engagement-ring/'.$product->item_sku)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.7));
        }

        $sitemap->writeToDisk('public', 'sitemap/eng_sitemap.xml');

    }
}
