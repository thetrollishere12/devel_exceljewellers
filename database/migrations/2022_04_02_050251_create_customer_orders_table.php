<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('order_num');
            $table->string('tracking_num')->nullable();
            $table->string('status')->nullable();
            $table->decimal('total_price', 65,2);
            $table->decimal('shipping_cost', 65,2);
            $table->decimal('tax', 65,2);
            $table->decimal('discount', 65,2);
            $table->string('payment_method');
            $table->string('contact_name');
            $table->string('phone_number');
            $table->string('email_address');
            $table->string('address');
            $table->string('unit')->nullable();
            $table->string('country');
            $table->string('spr');
            $table->string('city');
            $table->string('zipcode');
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
        Schema::dropIfExists('customer_orders');
    }
}
