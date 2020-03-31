<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSituationMatrimonialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situation_matrimoniales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('statuts');
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('agents_situation_matrimoniales', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('situation_matrimoniale_id')->unsigned()->index();
            $table->foreign('situation_matrimoniale_id')->references('id')->on('situation_matrimoniales');
            $table->bigInteger('agent_id')->unsigned()->index();
            $table->foreign('agent_id')->references('id')->on('agents');
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
        Schema::dropIfExists('situation_matrimoniales');
    }
}
