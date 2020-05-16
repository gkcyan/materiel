<?php

namespace App\Repositories;

use App\Models\site;
use App\Repositories\BaseRepository;

/**
 * Class siteRepository
 * @package App\Repositories
 * @version May 15, 2020, 9:52 pm UTC
*/

class siteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return site::class;
    }
}
