<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabGrownDiamondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_grown_diamonds', function (Blueprint $table) {
            $table->id();
            $table->string('file_type');
            $table->string('company');
            $table->string('item_sku');
            $table->string('name');
            $table->string('description');
            $table->string('currency');
            $table->decimal('price', 65,2);
            $table->decimal('carat', 5,2);
            $table->string('shape');
            $table->string('color');
            $table->string('clarity');
            $table->string('cut')->nullable();;
            $table->string('polish')->nullable();
            $table->string('width');
            $table->string('length');
            $table->string('MM');
            $table->string('table')->nullable();
            $table->string('certificate')->nullable();
            $table->string('report')->nullable();
            $table->longText('img_link');
            $table->longText('img_link2')->nullable();
            $table->longText('video_link');
            $table->longText('item_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_grown_diamonds');
    }
}
