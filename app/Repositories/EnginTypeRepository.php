<?php

namespace App\Repositories;

use App\Models\EnginType;
use App\Repositories\BaseRepository;

/**
 * Class EnginTypeRepository
 * @package App\Repositories
 * @version June 1, 2020, 2:33 am UTC
*/

class EnginTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'code',
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
        return EnginType::class;
    }
}
