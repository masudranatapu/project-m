<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->string('user_id');
            $table->string('category_id');
            $table->string('subcategory_id')->nullable();
            $table->string('subsubcategory_id')->nullable();
            $table->string('brand_id');
            $table->string('size_id')->nullable();
            $table->string('color_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('sell_price');
            $table->integer('discount');
            $table->integer('regular_price')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('availability');
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->string('product_type');
            $table->string('thambnail')->nullable();
            $table->text('multi_thambnail')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('products');
    }
}
