<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBasculeDatasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bascule_datas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('num_ticket', 10)->nullable();
            $table->string('date_sortie', 10)->nullable();
            $table->string('heure_sortie', 10)->nullable();
            $table->string('date_entree', 10)->nullable();
            $table->string('heure_entree', 10)->nullable();
            $table->string('camion', 10)->nullable();
            $table->string('citerne', 10)->nullable();
            $table->string('code_client', 10)->nullable();
            $table->string('client', 10)->nullable();
            $table->string('code_produit', 10)->nullable();
            $table->string('produit', 10)->nullable();
            $table->string('code_origine', 10)->nullable();
            $table->string('origine', 10)->nullable();
            $table->string('origine_reelle', 10)->nullable();
            $table->string('code_type_de_vehicule', 10)->nullable();
            $table->string('type_de_vehicule', 10)->nullable();
            $table->string('code_nom_chaufffeur', 10)->nullable();
            $table->string('nom_chaufffeur', 10)->nullable();
            $table->string('code_nom_transporteur', 10)->nullable();
            $table->string('nom_transporteur', 10)->nullable();
            $table->string('code_type_operation', 10)->nullable();
            $table->string('type_operation', 10)->nullable();
            $table->string('n_recette', 10)->nullable();
            $table->string('n_bon_enlevement', 10)->nullable();
            $table->string('n_liasse', 10)->nullable();
            $table->string('n_facture', 10)->nullable();
            $table->string('nom_chauf_prive', 10)->nullable();
            $table->string('nom_client_part', 10)->nullable();
            $table->string('poids_declare', 10)->nullable();
            $table->string('observation', 10)->nullable();
            $table->string('poids_entree', 10)->nullable();
            $table->string('poids_sortie', 10)->nullable();
            $table->string('poids_net', 10)->nullable();
            $table->string('ecart', 10)->nullable();
            $table->string('type_pesee', 10)->nullable();
            $table->string('transaction', 10)->nullable();
            $table->string('code_societe', 10)->nullable();
            $table->string('raison_sociale', 10)->nullable();
            $table->string('1_peseur', 10)->nullable();
            $table->string('2_peseur', 10)->nullable();
            $table->string('cout_km', 10)->nullable();
            $table->string('cout_ticket', 10)->nullable();
            $table->string('autor_creat')->nullable();
            $table->string('autor_update')->nullable();
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
        Schema::drop('bascule_datas');
    }
}
