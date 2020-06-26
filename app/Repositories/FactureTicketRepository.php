<?php

namespace App\Repositories;

use App\Models\FactureTicket;
use App\Repositories\BaseRepository;

/**
 * Class FactureTicketRepository
 * @package App\Repositories
 * @version June 25, 2020, 3:36 pm UTC
*/

class FactureTicketRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'facture_id',
        'ticket_id'
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
        return FactureTicket::class;
    }
}
