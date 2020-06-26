<?php

namespace App\Repositories;

use App\Models\Facture;
use App\Repositories\BaseRepository;

/**
 * Class FactureRepository
 * @package App\Repositories
 * @version June 25, 2020, 11:44 am UTC
*/

class FactureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fournisseur_id',
        'reference',
        'description',
        'date',
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
        return Facture::class;
    }
}
