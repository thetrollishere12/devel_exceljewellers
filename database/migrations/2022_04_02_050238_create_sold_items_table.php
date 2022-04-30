<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_items', function (Blueprint $table) {
            $table->id();
            $table->string('order_num');
            $table->integer('user_id');
            $table->string('item_sku');
            $table->string('img')->nullable();
            $table->string('item_style')->nullable();
            $table->decimal('sold_price',65,2);
            $table->decimal('tax',65,2);
            $table->string('size')->nullable();
            $table->string('engraving')->nullable();
            $table->string('returns');
            $table->integer('diamond_id')->nullable();
            $table->string('diamond_name')->nullable();
            $table->string('diamond_shape')->nullable();
            $table->decimal('diamond_price',65,2)->nullable();
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
        Schema::dropIfExists('sold_items');
    }
}
