<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFournisseursTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('raison_so',30)->unique();
            $table->string('compte_contr',20)->unique();
            $table->string('reg_com',20)->unique();
            $table->string('interlocuteur');
            $table->string('contact');
            $table->string('email');
            $table->integer('statut');
            $table->string('siege')->nullable();
            $table->string('observation')->nullable();
            $table->integer('type_fournisseur_id')->unsigned();
            $table->string('autor_creat')->nullable();
            $table->string('autor_update')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('type_fournisseur_id')->references('id')->on('type_fournisseurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fournisseurs');
    }
}
