<?php

namespace App\Repositories;

use App\Models\EnginModele;
use App\Repositories\BaseRepository;

/**
 * Class EnginModeleRepository
 * @package App\Repositories
 * @version June 1, 2020, 12:20 am UTC
*/

class EnginModeleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'modele',
        'code',
        'marque_id',
        'annee',
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
        return EnginModele::class;
    }
}
