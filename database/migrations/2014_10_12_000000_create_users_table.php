<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role', 10)->default('user');
            $table->string('refered_id', 10)->nullable();
            $table->string('country_code', 10);
            $table->string('country', 90);
            $table->string('state', 90);
            $table->string('currency', 10);
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->string('phone', 100)->nullable();
            $table->string('flag', 10);
            $table->text('address')->nullable();
            $table->string('image')->nullable();
            $table->double('balance', 16, 3)->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('verifycode')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
