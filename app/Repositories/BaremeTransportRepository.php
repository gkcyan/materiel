<?php

namespace App\Repositories;

use App\Models\BaremeTransport;
use App\Repositories\BaseRepository;

/**
 * Class BaremeTransportRepository
 * @package App\Repositories
 * @version June 7, 2020, 6:11 pm UTC
*/

class BaremeTransportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'origine_id',
        'destination_id',
        'distance',
        'cout',
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
        return BaremeTransport::class;
    }
}
