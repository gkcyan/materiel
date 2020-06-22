<?php

namespace App\Repositories;

use App\Models\Accompte;
use App\Repositories\BaseRepository;

/**
 * Class AccompteRepository
 * @package App\Repositories
 * @version June 22, 2020, 9:18 pm UTC
*/

class AccompteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_accompte_id',
        'fournisseur_id',
        'description',
        'Montant',
        'date',
        'caisse',
        'caissier',
        'recup_par',
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
        return Accompte::class;
    }
}
