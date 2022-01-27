<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('order_id');
            $table->string('shipping_name');
            $table->string('shipping_email');
            $table->string('shipping_division_id');
            $table->string('shipping_district_id')->nullable();
            $table->string('shipping_thana_code')->nullable();
            $table->string('shipping_phone');
            $table->string('shipping_address');
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
        Schema::dropIfExists('shipping_addresses');
    }
}
