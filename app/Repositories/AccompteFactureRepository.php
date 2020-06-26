<?php

namespace App\Repositories;

use App\Models\AccompteFacture;
use App\Repositories\BaseRepository;

/**
 * Class AccompteFactureRepository
 * @package App\Repositories
 * @version June 25, 2020, 4:19 pm UTC
*/

class AccompteFactureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'facture_id'
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
        return AccompteFacture::class;
    }
}
