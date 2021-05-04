<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capexes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('sen');
            $table->string('gen');
            $table->integer('ref');
            $table->string('ref2');
            $table->integer('ref3');
            $table->bigInteger('reference');
            $table->string('title');
            $table->integer('quantity');
            $table->string('reason');
            $table->string('manu');
            $table->string('import');
            $table->string('agent');
            $table->string('doc1')->nullable();
            $table->string('doc2')->nullable();
            $table->string('doc3')->nullable();
            $table->string('capacity')->nullable();
            $table->bigInteger('base')->nullable();
            $table->bigInteger('eqcost')->nullable();
            $table->bigInteger('duty')->nullable();
            $table->bigInteger('vattable')->nullable();
            $table->bigInteger('electrical')->nullable();
            $table->bigInteger('total')->nullable();
            $table->string('order')->nullable();
            $table->string('terms')->nullable();
            $table->integer('warranty')->nullable();
            $table->string('time')->nullable();
            $table->string('purpose')->nullable();
            $table->string('repname')->nullable();
            $table->string('repold')->nullable();
            $table->string('repreason')->nullable();
            $table->string('repmode')->nullable();
            $table->string('capcat')->nullable();
            $table->string('capadd')->nullable();
            $table->string('capquality')->nullable();
            $table->string('capred')->nullable();
            $table->string('capcomm')->nullable();
            $table->string('capminmaj')->nullable();
            $table->string('capspe')->nullable();
            $table->string('acplants')->nullable();
            $table->string('acfume')->nullable();
            $table->string('acmeasure')->nullable();
            $table->string('acvoltage')->nullable();
            $table->string('acoil')->nullable();
            $table->string('acmaterial')->nullable();
            $table->string('accabin')->nullable();
            $table->string('acfurniture')->nullable();
            $table->string('accivil')->nullable();
            $table->string('acelectrical')->nullable();
            $table->string('space');
            $table->string('installapprox');
            $table->string('travel');
            $table->string('maintenance');
            $table->string('speinstruction');
            $table->string('training');
            $table->string('rec');
            $table->string('rec1')->nullable();
            $table->string('rec2')->nullable();
            $table->string('rec3')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capexes');
    }
}
