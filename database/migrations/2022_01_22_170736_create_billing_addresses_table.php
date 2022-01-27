<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('order_id');
            $table->string('billing_name');
            $table->string('billing_email');
            $table->string('billing_division_id');
            $table->string('billing_district_id')->nullable();
            $table->string('billing_thana_code')->nullable();
            $table->string('billing_phone');
            $table->string('billing_address');
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
        Schema::dropIfExists('billing_addresses');
    }
}
