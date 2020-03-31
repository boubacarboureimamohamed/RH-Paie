<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinPaiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletin_paies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('salairebase');
            $table->string('nombrejour');
            $table->string('heuresup');
            $table->float('prime');
            $table->string('cnss');
            $table->string('absence');
            $table->float('netapayer');
            $table->timestamps();
        });

        Schema::create('bulletin_mode_paiement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('datepaiement');
            $table->bigInteger('mode_paiement_id')->unsigned()->index();
            $table->foreign('mode_paiement_id')->references('id')->on('mode_paiements');
            $table->bigInteger('bulletin_paie_id')->unsigned()->index();
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
        Schema::dropIfExists('bulletin_paies');
    }
}
