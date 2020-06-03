<?php

namespace App\Repositories;

use App\Models\VentePetrolier;
use App\Repositories\BaseRepository;

/**
 * Class VentePetrolierRepository
 * @package App\Repositories
 * @version June 3, 2020, 12:27 am UTC
*/

class VentePetrolierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'marque_id',
        'matricule_id',
        'transporteur_id',
        'produit_id',
        'quantite',
        'date',
        'chauffeur_id',
        'activite_id',
        'kilometrage',
        'statut_compteur',
        'pompiste_id',
        'pompe_id',
        'station_id',
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
        return VentePetrolier::class;
    }
}
