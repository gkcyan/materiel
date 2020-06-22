<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeFournisseursTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_fournisseurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_fournisseur',30)->unique();
            $table->string('code_type_fournisseur',10)->unique();
            $table->string('observation');
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
        Schema::drop('type_fournisseurs');
    }
}
