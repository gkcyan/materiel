<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EnginKilometrage
 * @package App\Models
 * @version June 2, 2020, 6:51 pm UTC
 *
 * @property \App\Models\Engin $matricule
 * @property \App\Models\Activite $activite
 * @property \App\Models\Station $station
 * @property integer $matricule_id
 * @property timestamps $date
 * @property number $kilometrage
 * @property integer $activite_id
 * @property integer $statut_compteur
 * @property integer $station_id
 * @property string $autor_creat
 * @property string $autor_update
 */
class EnginKilometrage extends Model
{
    use SoftDeletes;

    public $table = 'engin_kilometrages';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'matricule_id',
        'date',
        'kilometrage',
        'activite_id',
        'statut_compteur',
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
        'matricule_id' => 'integer',
        'activite_id' => 'integer',
        'statut_compteur' => 'integer',
        'station_id' => 'integer',
        'autor_creat' => 'string',
        'autor_update' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matricule_id' => 'required',
        'date' => 'required',
        'kilometrage' => 'required',
        'activite_id' => 'required',
        'station_id' => 'required'
    ];

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
    public function activite()
    {
        return $this->belongsTo(\App\Models\Activite::class, 'activite_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function station()
    {
        return $this->belongsTo(\App\Models\Station::class, 'station_id');
    }
}
