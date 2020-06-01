<?php

namespace App\Repositories;

use App\Models\EnginMarque;
use App\Repositories\BaseRepository;

/**
 * Class EnginMarqueRepository
 * @package App\Repositories
 * @version May 31, 2020, 11:59 pm UTC
*/

class EnginMarqueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'marque',
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
        return EnginMarque::class;
    }
}
