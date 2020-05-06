<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naiss');
            $table->string('lieu_naiss');
            $table->string('sexe');
            $table->string('adresse');
            $table->string('nationalite');
            $table->string('telephone')->unique();
            $table->string('email')->unique()->nullable();
            $table->date('date_debut_stage');
            $table->date('date_fin_stage');
            $table->bigInteger('theme_id')->unsigned()->index();
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->bigInteger('service_id')->unsigned()->index();
            $table->foreign('service_id')->references('id')->on('services');
            $table->bigInteger('recrutement_id')->unsigned()->index()->nullable();
            $table->foreign('recrutement_id')->references('id')->on('recrutements');
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
        Schema::dropIfExists('stagiaires');
    }
}
