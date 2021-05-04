<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendApprovalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sendapprovals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('sen');
            $table->string('gen');
            $table->text('type')->nullable();
            $table->integer('ref');
            $table->string('ref2');
            $table->integer('ref3');
            $table->bigInteger('reference');
            $table->string('sub');
            $table->string('title');
            $table->string('des');
            $table->string('md')->nullable();
            $table->string('sd')->nullable();
            $table->integer('rec');
            $table->integer('rec1')->nullable();
            $table->integer('rec2')->nullable();
            $table->integer('rec3')->nullable();
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sendapprovals');
    }
}
