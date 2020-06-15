<?php

namespace App\Repositories;

use App\Models\BaremePenaliteTransport;
use App\Repositories\BaseRepository;

/**
 * Class BaremePenaliteTransportRepository
 * @package App\Repositories
 * @version June 15, 2020, 11:29 am UTC
*/

class BaremePenaliteTransportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'freinte',
        'prix_aiph',
        'coef',
        'penalite_tonne',
        'debut',
        'fin',
        'statut',
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
        return BaremePenaliteTransport::class;
    }
}
