<?php

namespace App\Repositories;

use App\Models\ChauffeurPermi;
use App\Repositories\BaseRepository;

/**
 * Class ChauffeurPermiRepository
 * @package App\Repositories
 * @version June 2, 2020, 3:58 pm UTC
*/

class ChauffeurPermiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'permis_ref',
        'categories',
        'date_validitie',
        'date_exp',
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
        return ChauffeurPermi::class;
    }
}
