<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactureTicketsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facture_id')->unsigned();
            $table->integer('ticket_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('facture_id')->references('id')->on('factures');
            $table->foreign('ticket_id')->references('id')->on('bascule_datas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facture_tickets');
    }
}
