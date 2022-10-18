<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TransferAWS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:transfer_aws';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transfer From Local To AWS';

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
        $base_path = '/gr';

        $images_in_base_path = Storage::disk('public')->files($base_path);
        self::upload_files($images_in_base_path);

        $directories_in_base_path = Storage::disk('public')->directories($base_path);
        foreach ($directories_in_base_path as $directory_in_base_path) {
            $images_in_sub_directory = Storage::disk('public')->files($directory_in_base_path);
            self::upload_files($images_in_sub_directory);

            $directories_in_sub_directory = Storage::disk('public')->directories($directory_in_base_path);
            foreach ($directories_in_sub_directory as $directory_in_sub_directory) {
                $all_images_in_sub_directory = Storage::disk('public')->allFiles($directory_in_sub_directory);
                self::upload_files($all_images_in_sub_directory);
            }
        }
    }

    private function upload_files($files) {
        foreach ($files as $image) {
            $contents = Storage::disk('public')->get($image);
            Storage::disk('s3')->put($image, $contents);
            echo Storage::disk('public')->url($image) . " => ";
            echo Storage::disk('s3')->url($image) . "\n";
        }
    }





    // public function handle()
    // {   



    //     // set_time_limit(0);

    //     // echo Storage::disk('s3')->url("/") . "\n";
    //     // $images = Storage::disk('public')->allFiles('/image/engagement-ring-360');

    //     // foreach ($images as $image) {
    //     //     $contents = Storage::disk('public')->get($image);
    //     //     Storage::disk('s3')->put($image, $contents);
    //     //     echo Storage::disk('public')->url($image) . " => ";
    //     //     echo Storage::disk('s3')->url($image) . "\n";
    //     // }



    //     set_time_limit(0);

    //     // Sub directory path 
    //     $base_path = '/';

    //     $images_in_base_path = Storage::disk('public')->files($base_path);
    //     self::upload_files($images_in_base_path);

    //     $directories_in_base_path = Storage::disk('public')->directories($base_path);
    //     foreach ($directories_in_base_path as $directory_in_base_path) {
    //         $images_in_sub_directory = Storage::disk('public')->files($directory_in_base_path);
    //         self::upload_files($images_in_sub_directory);
    //     }
        
    // }

    // private function upload_files($files) {
    //     foreach ($files as $image) {
    //         $contents = Storage::disk('public')->get($image);
    //         Storage::disk('s3')->put($image, $contents);
    //         echo Storage::disk('public')->url($image) . " => ";
    //         echo Storage::disk('s3')->url($image) . "\n";
    //     }
    // }









    
}