<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('nbr_jour');
            $table->boolean('paiement_absence');
            $table->string('motif_absence');
            $table->double('montant_a_prelever');
            $table->bigInteger('type_absence_id')->unsigned()->index();
            $table->foreign('type_absence_id')->references('id')->on('type_absences');
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
        Schema::dropIfExists('absences');
    }
}
