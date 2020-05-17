<?php

namespace App\Repositories;

use App\Models\Agence;
use App\Repositories\BaseRepository;

/**
 * Class AgenceRepository
 * @package App\Repositories
 * @version May 17, 2020, 12:09 am UTC
*/

class AgenceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'entreprise_id'
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
        return Agence::class;
    }
}
