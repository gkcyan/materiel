<?php

namespace App\Repositories;

use App\Models\Cuve;
use App\Repositories\BaseRepository;

/**
 * Class CuveRepository
 * @package App\Repositories
 * @version May 31, 2020, 10:28 pm UTC
*/

class CuveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cuve',
        'code',
        'capacite',
        'hauteur',
        'station_id',
        'produit_id',
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
        return Cuve::class;
    }
}
