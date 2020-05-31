<?php

namespace App\Repositories;

use App\Models\Categorie;
use App\Repositories\BaseRepository;

/**
 * Class CategorieRepository
 * @package App\Repositories
 * @version May 31, 2020, 7:53 pm UTC
*/

class CategorieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'categorie',
        'description',
        'statut',
        'code_prodtui'
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
        return Categorie::class;
    }
}
