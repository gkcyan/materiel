<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Engin
 * @package App\Models
 * @version June 1, 2020, 3:53 am UTC
 *
 * @property \App\Models\EnginMarque $marque
 * @property \App\Models\EnginModel $modele
 * @property \App\Models\EnginType $type
 * @property \App\Models\Produit $produit
 * @property integer $marque_id
 * @property integer $modele_id
 * @property string $matricule
 * @property integer $type_id
 * @property string $code
 * @property integer $energie_id
 * @property string $chassis
 * @property string $poids_vide
 * @property string $charge_utile
 * @property string $poids_charge
 * @property string $km_depart
 * @property string $couleur
 * @property string $essieux
 * @property string $places
 * @property string $usage
 * @property string $date_circ
 * @property string $nb_roue
 * @property integer $statut
 */
class Engin extends Model
{
    use SoftDeletes;

    public $table = 'engins';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'marque_id',
        'modele_id',
        'matricule',
        'type_id',
        'code',
        'energie_id',
        'chassis',
        'poids_vide',
        'charge_utile',
        'poids_charge',
        'km_depart',
        'couleur',
        'essieux',
        'places',
        'usage',
        'date_circ',
        'nb_roue',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'marque_id' => 'integer',
        'modele_id' => 'integer',
        'matricule' => 'string',
        'type_id' => 'integer',
        'code' => 'string',
        'energie_id' => 'integer',
        'chassis' => 'string',
        'poids_vide' => 'string',
        'charge_utile' => 'string',
        'poids_charge' => 'string',
        'km_depart' => 'string',
        'couleur' => 'string',
        'essieux' => 'string',
        'places' => 'string',
        'usage' => 'string',
        'date_circ' => 'date',
        'nb_roue' => 'string',
        'statut' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'marque_id' => 'required',
        'modele_id' => 'required',
        'matricule' => 'required',
        'type_id' => 'required',
        'energie_id' => 'required',
        'chassis' => 'required',
        'poids_vide' => 'required',
        'charge_utile' => 'required',
        'poids_charge' => 'required',
        'km_depart' => 'required',
        'couleur' => 'required',
        'essieux' => 'required',
        'places' => 'required',
        'usage' => 'required',
        'date_circ' => 'required',
        'nb_roue' => 'required',
        'statut' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    //public function marque()
   // {
   //     return $this->belongsTo(\App\Models\EnginMarque::class, 'marque_id');
    //}

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
    public function type()
    {
        return $this->belongsTo(\App\Models\EnginType::class, 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function produit()
    {
        return $this->belongsTo(\App\Models\Produit::class, 'produit_id');
    }
}
