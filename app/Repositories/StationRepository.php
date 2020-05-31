<?php

namespace App\Repositories;

use App\Models\Station;
use App\Repositories\BaseRepository;

/**
 * Class StationRepository
 * @package App\Repositories
 * @version May 31, 2020, 3:36 pm UTC
*/

class StationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'station',
        'petrolier_id'
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
        return Station::class;
    }
}
