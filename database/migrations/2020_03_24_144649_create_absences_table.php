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
            $table->date('date_debut_absence');
            $table->date('date_fin_absence');
            $table->string('motif_absence');
            $table->bigInteger('type_absences_id')->unsigned()->index();
            $table->foreign('type_absences_id')->references('id')->on('type_absences');
            $table->bigInteger('agents_absences_id')->unsigned()->index();
            $table->foreign('agents_absences_id')->references('id')->on('agents');
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
