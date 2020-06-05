<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lieu');
            $table->date('date_debut_formation');
            $table->date('date_fin_formation');
            $table->string('attestation');
            $table->bigInteger('type_formation_id')->unsigned()->index();
            $table->foreign('type_formation_id')->references('id')->on('type_formations');
            $table->timestamps();
        });

        Schema::create('agent_formation', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('agent_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->bigInteger('formation_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('formation_id')->references('id')->on('formations');
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
        Schema::dropIfExists('formations');
    }
}
