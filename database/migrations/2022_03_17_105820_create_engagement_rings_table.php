<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngagementRingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engagement_rings', function (Blueprint $table) {
            $table->id();
            $table->string('file_type');
            $table->string('item_code');
            $table->string('item_sku');
            $table->string('style');
            $table->string('name');
            $table->string('image');
            $table->string('image_360')->nullable();
            $table->string('currency');
            $table->decimal('price', 65,2);
            $table->decimal('sale_price', 65,2)->nullable();
            $table->string('stoneshape')->nullable();
            $table->longText('description')->nullable();
            $table->text('collection')->nullable();
            $table->text('metal');
            $table->text('color');
            $table->string('width');
            $table->string('setting_type');
            $table->string('carat')->nullable();
            $table->string('brand')->nullable();
            $table->string('item_link')->nullable();
            $table->integer('quantity');
            $table->integer('count');
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
        Schema::dropIfExists('engagement_rings');
    }
}
