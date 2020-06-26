<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccompteFacturesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accompte_factures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facture_id')->unsigned();
            $table->integer('accompte_id')->unsigned()->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('facture_id')->references('id')->on('factures');
            $table->foreign('accompte_id')->references('id')->on('accomptes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accompte_factures');
    }
}
