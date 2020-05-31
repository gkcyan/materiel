<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuvesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cuve',60)->unique();
            $table->string('code',10)->unique();
            $table->string('capacite');
            $table->string('hauteur');
            $table->integer('station_id')->unsigned();
            $table->integer('produit_id')->unsigned();
            $table->integer('statut');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('station_id')->references('id')->on('stations');
            $table->foreign('produit_id')->references('id')->on('produits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cuves');
    }
}
