<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClotureMensuellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cloture_mensuelles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('mois_cloture');
            $table->date('date_cloture');
            $table->bigInteger('payroll_id')->unsigned()->index()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('payroll_id')->references('id')->on('payrolls');
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
        Schema::dropIfExists('cloture_mensuelles');
    }
}
