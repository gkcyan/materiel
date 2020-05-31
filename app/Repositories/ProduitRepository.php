<?php

namespace App\Repositories;

use App\Models\Produit;
use App\Repositories\BaseRepository;

/**
 * Class ProduitRepository
 * @package App\Repositories
 * @version May 31, 2020, 9:51 pm UTC
*/

class ProduitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'produit',
        'description',
        'categorie_id',
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
        return Produit::class;
    }
}
