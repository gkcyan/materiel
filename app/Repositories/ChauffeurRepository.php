<?php

namespace App\Repositories;

use App\Models\Chauffeur;
use App\Repositories\BaseRepository;

/**
 * Class ChauffeurRepository
 * @package App\Repositories
 * @version June 2, 2020, 3:19 pm UTC
*/

class ChauffeurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'photo',
        'nom',
        'prenom',
        'contact',
        'entreprise_id',
        'contrat',
        'date_contrat',
        'date_naissance',
        'lieu_naissance',
        'ethnie',
        'religion',
        'sit_maritale',
        'groupe_sang',
        'nb_enfant',
        'cni_ref',
        'permis_ref',
        'residence',
        'code',
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
        return Chauffeur::class;
    }
}
