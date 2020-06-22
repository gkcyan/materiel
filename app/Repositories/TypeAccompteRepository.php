<?php

namespace App\Repositories;

use App\Models\TypeAccompte;
use App\Repositories\BaseRepository;

/**
 * Class TypeAccompteRepository
 * @package App\Repositories
 * @version June 22, 2020, 4:17 pm UTC
*/

class TypeAccompteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_accompte',
        'code_type_accompte',
        'description',
        'statut',
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
        return TypeAccompte::class;
    }
}
