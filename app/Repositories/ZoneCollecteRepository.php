<?php

namespace App\Repositories;

use App\Models\ZoneCollecte;
use App\Repositories\BaseRepository;

/**
 * Class ZoneCollecteRepository
 * @package App\Repositories
 * @version June 7, 2020, 4:50 pm UTC
*/

class ZoneCollecteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'zone',
        'code_zone',
        'type_zone_id',
        'rayon',
        'gps_coord',
        'observation',
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
        return ZoneCollecte::class;
    }
}
