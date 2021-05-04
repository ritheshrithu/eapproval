<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sen');
        $table->string('gen');
        $table->integer('ref');
        $table->string('ref2');
        $table->integer('ref3');
        $table->bigInteger('reference');
        $table->string('title');
        $table->string('address');
        $table->integer('telephone');
        $table->string('constitution');
        $table->integer('year');
        $table->string('email');
        $table->string('pan');
        $table->string('cin');
        $table->string('gst');
        $table->string('state');
        $table->string('currency');
        $table->string('bankname');
        $table->string('bankbranch');
        $table->integer('bankaccno');
        $table->string('bankifsc');
        $table->string('setup');
        $table->string('component');
        $table->string('supplied');
        $table->string('cuttools');
        $table->integer('duration');
        $table->string('source');
        $table->string('brands');
        $table->bigInteger('sales1');
        $table->bigInteger('sales2');
        $table->bigInteger('sales3');
        $table->integer('employees');
        $table->string('transaction');
        $table->bigInteger('annual');
        $table->string('payment');
        $table->string('justify');
        $table->string('remarks');
        $table->string('doc1')->nullable();
        $table->string('doc2')->nullable();
        $table->string('doc3')->nullable();
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
        Schema::dropIfExists('credits');
    }
}
