<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_adds', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('vendor_id');
            $table->integer('user_id');
            $table->integer('qty');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('cart_adds');
    }
}