<?php

namespace App\Repositories;

use App\Models\Entreprise;
use App\Repositories\BaseRepository;

/**
 * Class entrepriseRepository
 * @package App\Repositories
 * @version May 20, 2020, 11:51 am UTC
*/

class EntrepriseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'actif'
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
        return entreprise::class;
    }
}
