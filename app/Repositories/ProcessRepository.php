<?php

namespace App\Repositories;

use App\Models\Process;
use App\Repositories\BaseRepository;

/**
 * Class ProcessRepository
 * @package App\Repositories
 * @version June 2, 2020, 3:02 pm UTC
*/

class ProcessRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'processus',
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
        return Process::class;
    }
}
