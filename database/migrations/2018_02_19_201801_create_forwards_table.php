<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forwards', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->integer('sen');
          $table->string('gen');
          $table->integer('ref');
          $table->string('ref2');
          $table->integer('ref3');          
          $table->bigInteger('reference')->nullable();
          $table->string('title')->nullable();
          $table->string('sub');
          $table->string('des');
          $table->string('md')->nullable();
          $table->string('sd')->nullable();
          $table->integer('rec')->nullable();
          $table->integer('rec1')->nullable();
          $table->integer('rec2')->nullable();
          $table->integer('rec3')->nullable();
          $table->timestamp('update1')->nullable();
          $table->timestamp('update2')->nullable();
          $table->timestamp('update3')->nullable();
          $table->timestamp('update4')->nullable();
          $table->string('ip1')->nullable();
          $table->string('ip2')->nullable();
          $table->string('ip3')->nullable();
          $table->string('ip4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forwards');
    }
}
