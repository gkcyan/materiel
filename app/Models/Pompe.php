<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pompe
 * @package App\Models
 * @version May 31, 2020, 10:49 pm UTC
 *
 * @property \App\Models\Station $station
 * @property \App\Models\Produit $produit
 * @property \App\Models\Cuve $cuve
 * @property string $pompe
 * @property string $marque
 * @property string $code
 * @property string $index_depart
 * @property integer $station_id
 * @property integer $produit_id
 * @property integer $cuve_id
 * @property integer $statut
 */
class Pompe extends Model
{
    use SoftDeletes;

    public $table = 'pompes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'pompe',
        'marque',
        'code',
        'index_depart',
        'station_id',
        'produit_id',
        'cuve_id',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pompe' => 'string',
        'marque' => 'string',
        'code' => 'string',
        'index_depart' => 'string',
        'station_id' => 'integer',
        'produit_id' => 'integer',
        'cuve_id' => 'integer',
        'statut' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pompe' => 'required',
        'code' => 'required',
        'index_depart' => 'required',
        'station_id' => 'required',
        'produit_id' => 'required',
        'cuve_id' => 'required',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cuve()
    {
        return $this->belongsTo(\App\Models\Cuve::class, 'cuve_id');
    }
}
