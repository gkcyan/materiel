<?php

namespace App\Repositories;

use App\Models\Activite;
use App\Repositories\BaseRepository;

/**
 * Class ActiviteRepository
 * @package App\Repositories
 * @version June 2, 2020, 3:06 pm UTC
*/

class ActiviteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'process_id',
        'activite',
        'statut',
        'finalite',
        'pilote',
        'controleur',
        'code',
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
        return Activite::class;
    }
}
