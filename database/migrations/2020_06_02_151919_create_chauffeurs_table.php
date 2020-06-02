<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChauffeursTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo');
            $table->string('nom');
            $table->string('prenom');
            $table->string('contact');
            $table->integer('entreprise_id');//->unsigned();
            $table->integer('contrat');
            $table->timestamp('date_contrat');
            $table->timestamp('date_naissance');
            $table->string('lieu_naissance');
            $table->string('ethnie');
            $table->string('religion');
            $table->string('sit_maritale');
            $table->string('groupe_sang');
            $table->string('nb_enfant');
            $table->string('cni_ref',20)->unique();
            $table->string('permis_ref',20)->unique();
            $table->string('residence');
            $table->string('code',10)->unique();
            $table->string('autor_creat');
            $table->string('autor_update');
            $table->timestamps();
            $table->softDeletes();
            //$table->foreign('entreprise_id')->references('id')->on('entreprises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chauffeurs');
    }
}
