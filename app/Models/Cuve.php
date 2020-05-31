<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cuve
 * @package App\Models
 * @version May 31, 2020, 10:28 pm UTC
 *
 * @property \App\Models\Station $station
 * @property \App\Models\Produit $produit
 * @property string $cuve
 * @property string $code
 * @property string $capacite
 * @property string $hauteur
 * @property integer $station_id
 * @property integer $produit_id
 * @property integer $statut
 */
class Cuve extends Model
{
    use SoftDeletes;

    public $table = 'cuves';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cuve',
        'code',
        'capacite',
        'hauteur',
        'station_id',
        'produit_id',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cuve' => 'string',
        'code' => 'string',
        'capacite' => 'string',
        'hauteur' => 'string',
        'station_id' => 'integer',
        'produit_id' => 'integer',
        'statut' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cuve' => 'required',
        'code' => 'required',
        'capacite' => 'required',
        'hauteur' => 'required',
        'station_id' => 'required',
        'produit_id' => 'required',
        'statut' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function station()
    {
        return $this->belongsTo(\App\Models\Station::class, 'station_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function produit()
    {
        return $this->belongsTo(\App\Models\Produit::class, 'produit_id');
    }
}
