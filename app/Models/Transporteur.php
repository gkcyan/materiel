<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transporteur
 * @package App\Models
 * @version May 24, 2020, 2:04 pm UTC
 *
 * @property string $libelle
 * @property string $compte_cont
 * @property string $reg_com
 * @property string $interlocuteur
 * @property string $interlo_cont
 * @property string $interlo_email
 * @property string $type
 * @property string $statut
 */
class Transporteur extends Model
{
    use SoftDeletes;

    public $table = 'transporteurs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'libelle',
        'compte_cont',
        'reg_com',
        'interlocuteur',
        'interlo_cont',
        'interlo_email',
        'type',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'libelle' => 'string',
        'compte_cont' => 'string',
        'reg_com' => 'string',
        'interlocuteur' => 'string',
        'interlo_cont' => 'string',
        'interlo_email' => 'string',
        'type' => 'string',
        'statut' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'required',
        'compte_cont' => 'required',
        'reg_com' => 'required',
        'interlocuteur' => 'required',
        'interlo_cont' => 'required',
        'interlo_email' => 'required',
        'type' => 'required',
        'statut' => 'null'
    ];

    
}
