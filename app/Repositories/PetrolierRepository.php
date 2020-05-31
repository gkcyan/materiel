<?php

namespace App\Repositories;

use App\Models\Petrolier;
use App\Repositories\BaseRepository;

/**
 * Class PetrolierRepository
 * @package App\Repositories
 * @version May 31, 2020, 2:47 pm UTC
*/

class PetrolierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'petrolier'
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
        return Petrolier::class;
    }
}
