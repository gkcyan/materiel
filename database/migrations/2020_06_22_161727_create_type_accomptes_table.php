<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeAccomptesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_accomptes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_accompte',30)->unique();
            $table->string('code_type_accompte',10)->unique();
            $table->string('description');
            $table->integer('statut');
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
        Schema::drop('type_accomptes');
    }
}
