<?php

namespace App\Repositories;

use App\Models\Entreprise--fieldsFile=entreprises;
use App\Repositories\BaseRepository;

/**
 * Class Entreprise--fieldsFile=entreprisesRepository
 * @package App\Repositories
 * @version May 16, 2020, 9:36 pm UTC
*/

class Entreprise--fieldsFile=entreprisesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Entreprise--fieldsFile=entreprises::class;
    }
}
