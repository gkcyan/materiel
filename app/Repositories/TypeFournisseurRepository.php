<?php

namespace App\Repositories;

use App\Models\TypeFournisseur;
use App\Repositories\BaseRepository;

/**
 * Class TypeFournisseurRepository
 * @package App\Repositories
 * @version June 22, 2020, 3:43 pm UTC
*/

class TypeFournisseurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_fournisseur',
        'code_type_fournisseur',
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
        return TypeFournisseur::class;
    }
}
