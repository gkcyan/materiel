<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnginsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marque_id')->unsigned();
            $table->integer('modele_id')->unsigned();
            $table->string('matricule',8)->unique();
            $table->integer('type_id')->unsigned();
            $table->string('code',10);
            $table->integer('energie_id')->unsigned();
            $table->string('chassis')->unique();
            $table->string('poids_vide');
            $table->string('charge_utile');
            $table->string('poids_charge');
            $table->string('km_depart');
            $table->string('couleur');
            $table->string('essieux');
            $table->string('places');
            $table->string('usage');
            $table->date('date_circ');
            $table->string('nb_roue');
            $table->integer('statut');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('marque_id')->references('id')->on('engin_marques');
            $table->foreign('modele_id')->references('id')->on('engin_modeles');
            $table->foreign('type_id')->references('id')->on('engin_types');
            $table->foreign('energie_id')->references('id')->on('produits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('engins');
    }
}
