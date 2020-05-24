<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransporteursTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporteurs', function (Blueprint $table) {
            $table->integer('id', true, true);
            $table->datetime('deleted_at')->nullable();
            $table->string('libelle', 255);
            $table->string('compte_cont', 255);
            $table->string('reg_com', 255);
            $table->string('interlocuteur', 255);
            $table->string('interlo_cont', 255);
            $table->string('interlo_email', 255);
            $table->string('type', 1);
            $table->string('statut', 1)->nullable();
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
        Schema::drop('transporteurs');
    }
}
