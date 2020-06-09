<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBasculesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bascules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bascule');
            $table->string('code',4)->unique();
            $table->string('localisation');
            $table->string('contact');
            $table->string('responsable');
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
        Schema::drop('bascules');
    }
}
