<?php

namespace App\Repositories;

use App\Models\Fournisseur;
use App\Repositories\BaseRepository;

/**
 * Class FournisseurRepository
 * @package App\Repositories
 * @version June 22, 2020, 8:02 pm UTC
*/

class FournisseurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'raison_so',
        'compte_contr',
        'reg_com',
        'interlocuteur ',
        'contact',
        'email',
        'statut',
        'siege',
        'observation',
        'type_fournisseur_id',
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
        return Fournisseur::class;
    }
}
