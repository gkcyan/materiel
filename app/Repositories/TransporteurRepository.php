<?php

namespace App\Repositories;

use App\Models\Transporteur;
use App\Repositories\BaseRepository;

/**
 * Class TransporteurRepository
 * @package App\Repositories
 * @version May 24, 2020, 2:04 pm UTC
*/

class TransporteurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'compte_cont',
        'reg_com',
        'interlocuteur',
        'interlo_cont',
        'interlo_email',
        'type',
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
        return Transporteur::class;
    }
}
