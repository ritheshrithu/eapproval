<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
                   $table->integer('sen');
        $table->string('gen');
        $table->integer('ref');
        $table->string('ref2');
        $table->integer('ref3');
        $table->bigInteger('reference');
            $table->string('location');
            $table->string('vendorcode');
            $table->string('paymentterms');
            $table->string('currency');
            $table->string('paymentmode');
            $table->string('class');
            $table->string('name');
            $table->string('address1');
            $table->string('address2');
            $table->string('address3');
            $table->string('doc1')->nullable();
            $table->string('doc2')->nullable();
            $table->string('doc3')->nullable();
            $table->string('city');
            $table->string('country');
            $table->string('state');
            $table->bigInteger('pincode');
            $table->bigInteger('phone');
            $table->bigInteger('fax');
            $table->string('email');
            $table->string('proposed');
            $table->string('justification');
            $table->string('paymentofterm');
            $table->string('referenceif');
            $table->string('pan');
            $table->string('esi');
            $table->string('vendortype');
            $table->string('gststate');
            $table->string('gstin');
            $table->string('hsncode');
            $table->string('saccode');
            $table->integer('rec');
            $table->integer('rec1');
            $table->integer('rec2');
            $table->integer('rec3');
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
        Schema::dropIfExists('vendors');
    }
}
