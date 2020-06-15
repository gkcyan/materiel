<?php

namespace App\Repositories;

use App\Models\BasculeData;
use App\Repositories\BaseRepository;

/**
 * Class BasculeDataRepository
 * @package App\Repositories
 * @version June 7, 2020, 6:19 pm UTC
*/

class BasculeDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'num_ticket',
        'date_sortie',
        'heure_sortie',
        'date_entree',
        'heure_entree',
        'camion',
        'citerne',
        'code_client',
        'client',
        'code_produit',
        'produit',
        'code_origine',
        'origine',
        'origine_reelle',
        'code_type_de_vehicule',
        'type_de_vehicule',
        'code_nom_chaufffeur',
        'nom_chaufffeur',
        'code_nom_transporteur',
        'nom_transporteur',
        'code_type_operation',
        'type_operation',
        'n_recette',
        'n_bon_enlevement',
        'n_liasse',
        'n_facture',
        'nom_chauf_prive',
        'nom_client_part',
        'poids_declare',
        'observation',
        'poids_entree',
        'poids_sortie',
        'poids_net',
        'ecart',
        'type_pesee',
        'transaction',
        'code_societe',
        'raison_sociale',
        '1_peseur',
        '2_peseur',
        'cout_km',
        'cout_ticket',
        'autor_creat',
        'autor_update',
        'destination',
        'destination_id',
        'origine_id',
        'ecart_freinte',
        'ecart_penalite_tonne',
        'ecart_penalite_cout'
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BasculeData::class;
    }
}
