<?php

namespace App\Repositories;

use App\Models\CarburantFacture;
use App\Repositories\BaseRepository;

/**
 * Class CarburantFactureRepository
 * @package App\Repositories
 * @version June 25, 2020, 2:34 pm UTC
*/

class CarburantFactureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'facture_id',
        'ventepetrolier_id'
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
        return CarburantFacture::class;
    }
}
