<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePompesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pompes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pompe',30)->unique();
            $table->string('marque');
            $table->string('code',10)->unique();
            $table->string('index_depart');
            $table->integer('station_id')->unsigned();
            $table->integer('produit_id')->unsigned();
            $table->integer('cuve_id')->unsigned();
            $table->integer('statut');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('station_id')->references('id')->on('stations');
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->foreign('cuve_id')->references('id')->on('cuves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pompes');
    }
}
