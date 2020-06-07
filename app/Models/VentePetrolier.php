<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VentePetrolier
 * @package App\Models
 * @version June 3, 2020, 12:27 am UTC
 *
 * @property \App\Models\Marque $marque
 * @property \App\Models\Engin $matricule
 * @property \App\Models\EnginModel $modele
 * @property \App\Models\Produit $produit
 * @property \App\Models\Chauffeur $chauffeur
 * @property \App\Models\Activite $activite
 * @property \App\Models\Pompiste $pompiste
 * @property \App\Models\Pompe $pompe
 * @property \App\Models\Station $station
 * @property integer $marque_id
 * @property integer $matricule_id
 * @property integer $transporteur_id
 * @property integer $produit_id
 * @property number $quantite
 * @property string $date
 * @property integer $chauffeur_id
 * @property integer $activite_id
 * @property string  $kilometrage
 * @property integer $statut_compteur
 * @property integer $pompiste_id
 * @property integer $pompe_id
 * @property integer $station_id
 * @property string $autor_creat
 * @property string $autor_update
 */
class VentePetrolier extends Model
{
    use SoftDeletes;

    public $table = 'vente_petroliers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'marque_id',
        'matricule_id',
        'transporteur_id',
        'produit_id',
        'quantite',
        'cout',
        'cout_remise',
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'marque_id' => 'integer',
        'matricule_id' => 'integer',
        'transporteur_id' => 'integer',
        'produit_id' => 'integer',
        'date' => 'date',
        'chauffeur_id' => 'integer',
        'activite_id' => 'integer',
        'statut_compteur' => 'integer',
        'pompiste_id' => 'integer',
        'pompe_id' => 'integer',
        'station_id' => 'integer',
        'autor_creat' => 'string',
        'autor_update' => 'string',
        'cout'=>'integer',
        'cout_remise'=>'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'marque_id' => 'required',
        'matricule_id' => 'required',
        'transporteur_id' => 'required',
        'produit_id' => 'required',
        'quantite' => 'required',
        'date' => 'required',
        'chauffeur_id' => 'required',
        'activite_id' => 'required',
        'kilometrage' => 'required',
        'pompiste_id' => 'required',
        'pompe_id' => 'required',
        'station_id' => 'required',
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function marque()
    {
        return $this->belongsTo(\App\Models\EnginMarque::class, 'marque_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function matricule()
    {
        return $this->belongsTo(\App\Models\Engin::class, 'matricule_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function modele()
    {
        return $this->belongsTo(\App\Models\EnginModele::class, 'modele_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function produit()
    {
        return $this->belongsTo(\App\Models\Produit::class, 'produit_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function chauffeur()
    {
        return $this->belongsTo(\App\Models\Chauffeur::class, 'chauffeur_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function activite()
    {
        return $this->belongsTo(\App\Models\Activite::class, 'activite_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pompiste()
    {
        return $this->belongsTo(\App\Models\Pompiste::class, 'pompiste_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pompe()
    {
        return $this->belongsTo(\App\Models\Pompe::class, 'pompe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function station()
    {
        return $this->belongsTo(\App\Models\Station::class, 'station_id');
    }

    public function transporteur()
    {
        return $this->belongsTo(\App\Models\Transporteur::class, 'transporteur_id');
    }
    
}
