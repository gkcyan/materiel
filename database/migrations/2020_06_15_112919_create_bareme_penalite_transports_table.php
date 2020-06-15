<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaremePenaliteTransportsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bareme_penalite_transports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('freinte');
            $table->integer('prix_aiph');
            $table->integer('coef');
            $table->integer('penalite_tonne');
            $table->date('debut');
            $table->date('fin');
            $table->integer('statut');
            $table->string('autor_creat');
            $table->string('autor_update');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bareme_penalite_transports');
    }
}
