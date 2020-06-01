<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnginModelesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engin_modeles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modele',40)->unique();
            $table->string('code',10)->unique();
            $table->integer('marque_id')->unsigned();
            $table->date('annee');
            $table->integer('statut');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('marque_id')->references('id')->on('engin_marques');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('engin_modeles');
    }
}
