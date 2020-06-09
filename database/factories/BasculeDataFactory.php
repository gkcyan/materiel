<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BasculeData;
use Faker\Generator as Faker;

$factory->define(BasculeData::class, function (Faker $faker) {

    return [
        'num_ticket' => $faker->word,
        'date_sortie' => $faker->word,
        'heure_sortie' => $faker->word,
        'date_entree' => $faker->word,
        'heure_entree' => $faker->word,
        'camion' => $faker->word,
        'citerne' => $faker->word,
        'code_client' => $faker->word,
        'client' => $faker->word,
        'code_produit' => $faker->word,
        'produit' => $faker->word,
        'code_origine' => $faker->word,
        'origine' => $faker->word,
        'origine_reelle' => $faker->word,
        'code_type_de_vehicule' => $faker->word,
        'type_de_vehicule' => $faker->word,
        'code_nom_chaufffeur' => $faker->word,
        'nom_chaufffeur' => $faker->word,
        'code_nom_transporteur' => $faker->word,
        'nom_transporteur' => $faker->word,
        'code_type_operation' => $faker->word,
        'type_operation' => $faker->word,
        'n_recette' => $faker->word,
        'n_bon_enlevement' => $faker->word,
        'n_liasse' => $faker->word,
        'n_facture' => $faker->word,
        'nom_chauf_prive' => $faker->word,
        'nom_client_part' => $faker->word,
        'poids_declare' => $faker->word,
        'observation' => $faker->word,
        'poids_entree' => $faker->word,
        'poids_sortie' => $faker->word,
        'poids_net' => $faker->word,
        'ecart' => $faker->word,
        'type_pesee' => $faker->word,
        'transaction' => $faker->word,
        'code_societe' => $faker->word,
        'raison_sociale' => $faker->word,
        '1_peseur' => $faker->word,
        '2_peseur' => $faker->word,
        'cout_km' => $faker->word,
        'cout_ticket' => $faker->word,
        'autor_creat' => $faker->word,
        'autor_update' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
