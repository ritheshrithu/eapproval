<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sen');
            $table->string('gen');
            $table->integer('ref');
            $table->string('ref2');
            $table->integer('ref3');
            $table->bigInteger('reference');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('pan');
            $table->string('constitution');
            $table->string('handler');
            $table->integer('year');
            $table->string('gst');
            $table->string('state');
            $table->string('dealerbank');
            $table->string('authdealer');
            $table->string('authdirect');
            $table->string('selling');
            $table->string('cutting');
            $table->string('reason');
            $table->string('nettake1');
            $table->string('nettake2');
            $table->string('nettake3');
            $table->string('paymentterms');
            $table->integer('rec');
            $table->integer('rec1')->nullable();
            $table->integer('rec2')->nullable();
            $table->integer('rec3')->nullable();
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
        Schema::dropIfExists('dealers');
    }
}
