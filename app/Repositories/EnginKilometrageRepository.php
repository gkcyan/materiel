<?php

namespace App\Repositories;

use App\Models\EnginKilometrage;
use App\Repositories\BaseRepository;

/**
 * Class EnginKilometrageRepository
 * @package App\Repositories
 * @version June 2, 2020, 6:51 pm UTC
*/

class EnginKilometrageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'matricule_id',
        'date',
        'kilometrage',
        'activite_id',
        'statut_compteur',
        'station_id',
        'autor_creat',
        'autor_update'
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
        return EnginKilometrage::class;
    }
}
