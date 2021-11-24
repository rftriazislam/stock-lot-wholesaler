<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_products', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('product_name');
            $table->string('slug');
            $table->string('product_id', 20);
            $table->text('description');
            $table->string('size', 50)->nullable();
            $table->string('unit');
            $table->string('color')->nullable();
            $table->integer('stock');
            $table->integer('mini_order');
            $table->text('order_note')->nullable();
            $table->string('files')->nullable();
            $table->string('main_picture');
            $table->string('video_link')->nullable();
            $table->double('price', 16, 3);
            $table->double('service_charge', 16, 3);
            $table->double('min_retail_price', 16, 3)->default(0.0);
            $table->double('max_retail_price', 16, 3)->default(0.0);
            $table->integer('sell_count')->default(0);
            $table->integer('views')->default(0);
            $table->tinyInteger('hot_product')->default(0);
            $table->tinyInteger('offline')->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('merchant_products');
    }
}