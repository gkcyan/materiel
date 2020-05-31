<?php

namespace App\Repositories;

use App\Models\Pompiste;
use App\Repositories\BaseRepository;

/**
 * Class PompisteRepository
 * @package App\Repositories
 * @version May 31, 2020, 4:30 pm UTC
*/

class PompisteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom',
        'contact',
        'station_id',
        'emploi',
        'contrat',
        'code'
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
        return Pompiste::class;
    }
}
