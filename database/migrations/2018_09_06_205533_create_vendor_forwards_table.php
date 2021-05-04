<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorForwardsTable extends Migration
{
    public function up()
    {
        Schema::create('vendorforwards', function (Blueprint $table) {
            $table->increments('id');
                   $table->integer('sen');
        $table->string('gen');
        $table->integer('ref');
        $table->string('ref2');
        $table->integer('ref3');
        $table->bigInteger('reference')->nullable();
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
        Schema::dropIfExists('vendorforwards');
    }
}
