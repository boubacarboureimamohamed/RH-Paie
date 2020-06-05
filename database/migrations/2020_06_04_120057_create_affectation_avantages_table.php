<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationAvantagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectation_avantages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('agent_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->bigInteger('avantage_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('avantage_id')->references('id')->on('avantages');
            $table->double('montant');
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
        Schema::dropIfExists('affectation_avantages');
    }
}
