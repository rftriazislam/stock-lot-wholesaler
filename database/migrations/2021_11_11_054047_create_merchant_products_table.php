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
            $table->string('product_id', 20);
            $table->text('description');
            $table->string('size', 50);
            $table->string('unit');
            $table->string('color');
            $table->string('stock');
            $table->string('mini_order');
            $table->text('order_note')->nullable();
            $table->string('files');
            $table->string('main_picture');
            $table->string('video_link')->nullable();
            $table->double('price', 16, 3);
            $table->double('service_charge', 16, 3);

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