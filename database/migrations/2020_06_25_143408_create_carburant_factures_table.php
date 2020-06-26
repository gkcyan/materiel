<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarburantFacturesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carburant_factures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facture_id')->unsigned();
            $table->integer('ventepetrolier_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('facture_id')->references('id')->on('factures');
            $table->foreign('ventepetrolier_id')->references('id')->on('vente_petroliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carburant_factures');
    }
}
