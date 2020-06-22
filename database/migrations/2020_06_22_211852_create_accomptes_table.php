<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccomptesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomptes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_accompte_id')->unsigned();
            $table->integer('fournisseur_id')->unsigned();
            $table->text('description');
            $table->integer('Montant');
            $table->date('date');
            $table->string('caisse');
            $table->string('caissier');
            $table->string('recup_par');
            $table->string('autor_creat');
            $table->string('autor_update');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('type_accompte_id')->references('id')->on('type_accomptes');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accomptes');
    }
}
