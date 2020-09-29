<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeuresSupplementairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heures_supplementaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nbr_heure');
            $table->integer('majoration');
            $table->date('mois_heure_supp');
            $table->double('montant_horaire');
            $table->double('montant_heure_supp');
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
        Schema::dropIfExists('heures_supplementaires');
    }
}
