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
            $table->date('date');
            $table->date('date_debut_formation');
            $table->date('date_fin_formation');
            $table->string('bilan_formation');
            $table->bigInteger('type_formations_id')->unsigned()->index();
            $table->foreign('type_formations_id')->references('id')->on('type_formations');
            $table->timestamps();
        });

        Schema::create('agents_formations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('agents_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agents_id')->references('id')->on('agents');
            $table->bigInteger('formations_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('formations_id')->references('id')->on('formations');
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
