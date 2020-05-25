<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naiss');
            $table->string('lieu_naiss');
            $table->string('sexe');
            $table->string('adresse');
            $table->string('nationalite');
            $table->string('fonction');
            $table->string('telephone')->unique();
            $table->string('email')->unique()->nullable();
            $table->bigInteger('recrutement_id')->unsigned()->index()->nullable();
            $table->foreign('recrutement_id')->references('id')->on('recrutements');
            $table->timestamps();
        });

        Schema::create('agent_mission', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('agent_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->bigInteger('mission_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mission_id')->references('id')->on('missions');
            $table->timestamps();
        });

        Schema::create('agent_bulletin_paie', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->bigInteger('agent_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->bigInteger('bulletin_paie_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bulletin_paie_id')->references('id')->on('bulletin_paies');
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
        Schema::dropIfExists('agents');
    }
}
