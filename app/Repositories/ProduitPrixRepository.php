<?php

namespace App\Repositories;

use App\Models\ProduitPrix;
use App\Repositories\BaseRepository;

/**
 * Class ProduitPrixRepository
 * @package App\Repositories
 * @version June 5, 2020, 9:54 am UTC
*/

class ProduitPrixRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'produit_id',
        'prix',
        'prix_remise',
        'debut',
        'fin',
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
        return ProduitPrix::class;
    }
}
