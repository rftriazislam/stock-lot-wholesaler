<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTransanctionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transanction_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('buyer_id');
            $table->integer('vendor_id');
            $table->string('tx_id');
            $table->text('order_list');
            $table->double('amount', 16, 3);
            $table->string('transaction_status')->default('init');
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
        Schema::dropIfExists('payment_transanction_histories');
    }
}