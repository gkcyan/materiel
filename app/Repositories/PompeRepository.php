<?php

namespace App\Repositories;

use App\Models\Pompe;
use App\Repositories\BaseRepository;

/**
 * Class PompeRepository
 * @package App\Repositories
 * @version May 31, 2020, 10:49 pm UTC
*/

class PompeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pompe',
        'marque',
        'code',
        'index_depart',
        'station_id',
        'produit_id',
        'cuve_id',
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
        return Pompe::class;
    }
}
