<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BaremePenaliteTransport
 * @package App\Models
 * @version June 15, 2020, 11:29 am UTC
 *
 * @property integer $freinte
 * @property integer $prix_aiph
 * @property integer $coef
 * @property integer $penalite_tonne
 * @property string $debut
 * @property string $fin
 * @property integer $statut
 * @property string $autor_creat
 * @property string $autor_update
 */
class BaremePenaliteTransport extends Model
{
    use SoftDeletes;

    public $table = 'bareme_penalite_transports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'freinte',
        'prix_aiph',
        'coef',
        'penalite_tonne',
        'debut',
        'fin',
        'statut',
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
        'freinte' => 'integer',
        'prix_aiph' => 'integer',
        'coef' => 'integer',
        'penalite_tonne' => 'integer',
        'debut' => 'date',
        'fin' => 'date',
        'statut' => 'integer',
        'autor_creat' => 'string',
        'autor_update' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'freinte' => 'required',
        'prix_aiph' => 'required',
        'coef' => 'required',
        'penalite_tonne' => 'required',
        'debut' => 'required',
        'fin' => 'required',
        'statut' => 'required'
    ];

    
}
