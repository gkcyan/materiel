<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentePetroliersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vente_petroliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marque_id')->unsigned();
            $table->integer('matricule_id')->unsigned();
            $table->integer('transporteur_id')->unsigned();
            $table->integer('produit_id')->unsigned();
            $table->string('quantite');
            $table->date('date');
            $table->integer('chauffeur_id')->unsigned();
            $table->integer('activite_id')->unsigned();
            $table->string ('kilometrage');
            $table->integer('statut_compteur');
            $table->integer('pompiste_id')->unsigned();
            $table->integer('pompe_id')->unsigned();
            $table->integer('station_id')->unsigned();
            $table->string('autor_creat');
            $table->string('autor_update');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('marque_id')->references('id')->on('engin_marques');
            $table->foreign('matricule_id')->references('id')->on('engins');
            $table->foreign('transporteur_id')->references('id')->on('transporteurs');
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->foreign('chauffeur_id')->references('id')->on('chauffeurs');
            $table->foreign('activite_id')->references('id')->on('activites');
            $table->foreign('pompiste_id')->references('id')->on('pompistes');
            $table->foreign('pompe_id')->references('id')->on('pompes');
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
        Schema::drop('vente_petroliers');
    }
}
