<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditForwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditforwards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sen');
        $table->string('gen');
        $table->integer('ref');
        $table->string('ref2');
        $table->integer('ref3');
        $table->bigInteger('reference')->nullable();
        $table->string('title');
        $table->string('address');
        $table->integer('telephone');
        $table->string('constitution');
        $table->integer('year');
        $table->integer('mobile');
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
        $table->integer('rec')->nullable();
            $table->integer('rec1')->nullable();
            $table->integer('rec2')->nullable();
            $table->integer('rec3')->nullable();
            $table->string('des')->nullable();
            $table->timestamp('update1')->nullable();
            $table->timestamp('update2')->nullable();
            $table->timestamp('update3')->nullable();
            $table->timestamp('update4')->nullable();
            $table->datetime('readat')->nullable();
            $table->datetime('readat1')->nullable();
            $table->datetime('readat2')->nullable();
            $table->datetime('readat3')->nullable();
            $table->datetime('readat4')->nullable();
            $table->string('ip1')->nullable();
            $table->string('ip2')->nullable();
            $table->string('ip3')->nullable();
            $table->string('ip4')->nullable();
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
        Schema::dropIfExists('credit_forwards');
    }
}
