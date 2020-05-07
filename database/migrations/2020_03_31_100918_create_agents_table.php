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

        Schema::create('agents_missions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('agent_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->bigInteger('mission_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mission_id')->references('id')->on('missions');
            $table->timestamps();
        });

        Schema::create('agents_services', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('agents_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agents_id')->references('id')->on('agents');
            $table->bigInteger('services_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('services_id')->references('id')->on('services');
            $table->timestamps();
        });

        Schema::create('agents_postes', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('agents_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agents_id')->references('id')->on('agents');
            $table->bigInteger('postes_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('postes_id')->references('id')->on('postes');
            $table->timestamps();
        });

        Schema::create('bulletin_paie_agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->bigInteger('agents_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agents_id')->references('id')->on('agents');
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
