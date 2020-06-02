<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChauffeurPermisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chauffeur_permis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('permis_ref');
            $table->string('categories');
            $table->timestamp('date_validitie');
            $table->timestamp('date_exp');
            $table->string('autor_creat');
            $table->string('autor_update');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chauffeur_permis');
    }
}
