<?php

namespace App\Repositories;

use App\Models\Bascule;
use App\Repositories\BaseRepository;

/**
 * Class BasculeRepository
 * @package App\Repositories
 * @version June 7, 2020, 3:32 pm UTC
*/

class BasculeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bascule',
        'code',
        'localisation',
        'contact',
        'responsable'
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
        return Bascule::class;
    }
}
