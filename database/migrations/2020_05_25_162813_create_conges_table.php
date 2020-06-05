<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('agent_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->bigInteger('type_conge_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_conge_id')->references('id')->on('type_conges');
            $table->date('date_debut_conge');
            $table->date('date_fin_conge');
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
        Schema::dropIfExists('conges');
    }
}
