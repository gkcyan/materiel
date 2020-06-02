<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnginKilometragesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engin_kilometrages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('matricule_id')->unsigned();
            $table->timestamp('date_km');
            $table->string('kilometrage');
            $table->integer('activite_id')->unsigned();
            $table->integer('statut_compteur');
            $table->integer('station_id')->unsigned();
            $table->string('autor_creat');
            $table->string('autor_update');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('matricule_id')->references('id')->on('engins');
            $table->foreign('activite_id')->references('id')->on('activites');
            $table->foreign('station_id')->references('id')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('engin_kilometrages');
    }
}
