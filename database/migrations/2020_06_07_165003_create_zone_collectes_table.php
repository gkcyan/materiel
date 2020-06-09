<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZoneCollectesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zone_collectes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zone',20)->unique();
            $table->string('code_zone',10)->unique();
            $table->integer('type_zone_id')->unsigned();
            $table->string('rayon')->nullable();
            $table->string('gps_coord')->nullable();
            $table->string('observation')->nullable();
            $table->string('autor_creat')->nullable();
            $table->string('autor_update')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('type_zone_id')->references('id')->on('type_zones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('zone_collectes');
    }
}
