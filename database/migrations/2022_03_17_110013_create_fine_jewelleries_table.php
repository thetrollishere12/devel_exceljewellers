<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFineJewelleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fine_jewelleries', function (Blueprint $table) {
            $table->id();
            $table->string('file_type');
            $table->string('item_code');
            $table->string('item_sku');
            $table->string('category');
            $table->string('style');
            $table->string('name');
            $table->string('image');
            $table->string('image_360')->nullable();
            $table->string('currency');
            $table->decimal('price', 65,2);
            $table->decimal('sale_price', 65,2)->nullable();
            $table->longText('description')->nullable();
            $table->text('collection')->nullable();
            $table->text('metal');
            $table->text('color');
            $table->string('width')->nullable();
            $table->string('setting_type')->nullable();
            $table->string('main_stone')->nullable();
            $table->string('other_stone')->nullable();
            $table->string('diamond_color')->nullable();
            $table->string('diamond_clarity')->nullable();
            $table->string('carat')->nullable();
            $table->string('stone_width')->nullable();
            $table->decimal('size', 65,2)->nullable();
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
        Schema::dropIfExists('fine_jewelleries');
    }
}
