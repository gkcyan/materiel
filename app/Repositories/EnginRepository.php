<?php

namespace App\Repositories;

use App\Models\Engin;
use App\Repositories\BaseRepository;

/**
 * Class EnginRepository
 * @package App\Repositories
 * @version June 1, 2020, 3:53 am UTC
*/

class EnginRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'marque_id',
        'modele_id',
        'matricule',
        'type_id',
        'code',
        'energie_id',
        'chassis',
        'poids_vide',
        'charge_utile',
        'poids_charge',
        'km_depart',
        'couleur',
        'essieux',
        'places',
        'usage',
        'date_circ',
        'nb_roue',
        'statut'
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
        return Engin::class;
    }
}
