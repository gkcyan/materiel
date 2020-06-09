<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaremeTransportsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bareme_transports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('origine_id',8)->unsigned();
            $table->integer('destination_id',8)->unsigned();
            $table->string('distance');
            $table->string('cout');
            $table->string('observation')->nullable();
            $table->string('autor_creat')->nullable();
            $table->string('autor_update')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('origine_id')->references('id')->on('zone_collectes');
            $table->foreign('destination_id')->references('id')->on('zone_collectes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bareme_transports');
    }
}
