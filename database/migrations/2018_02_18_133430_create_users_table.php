<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('roll');
            $table->string('password');
            $table->string('name');
            $table->string('email');
            $table->integer('manager');
            $table->integer('superuser');
            $table->integer('supervisor');
            $table->integer('planthead');
            $table->integer('vpo');
            $table->integer('vpca');
            $table->integer('director');
            $table->integer('capex')->nullable();
            $table->integer('credit')->nullable();
            $table->integer('vendor')->nullable();
            $table->integer('dealer')->nullable();
            $table->integer('other')->nullable();
            $table->timestamps();
            $table->string('remember_token')->nullable();
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
