<?php

namespace App\Repositories;

use App\Models\TypeZone;
use App\Repositories\BaseRepository;

/**
 * Class TypeZoneRepository
 * @package App\Repositories
 * @version June 7, 2020, 4:25 pm UTC
*/

class TypeZoneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_zone',
        'code_type_zone',
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
        return TypeZone::class;
    }
}
