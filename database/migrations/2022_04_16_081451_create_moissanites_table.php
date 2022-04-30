<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoissanitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moissanite', function (Blueprint $table) {
            $table->id();
            $table->string('file_type');
            $table->string('item_sku');
            $table->string('name');

            $table->string('MM');
            $table->decimal('carat',65,2);
            $table->decimal('weight',4,3);
            $table->string('currency');
            $table->decimal('price',65,2);
            $table->string('type')->nullable();
            $table->string('shape');
            $table->string('company')->nullable();
            $table->string('video_link')->nullable();
            $table->string('img_link')->nullable();


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
        Schema::dropIfExists('moissanites');
    }
}
