<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bascule
 * @package App\Models
 * @version June 7, 2020, 3:32 pm UTC
 *
 * @property string $bascule
 * @property string $code
 * @property string $localisation
 * @property string $contact
 * @property string $responsable
 */
class Bascule extends Model
{
    use SoftDeletes;

    public $table = 'bascules';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'bascule',
        'code',
        'localisation',
        'contact',
        'responsable'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bascule' => 'string',
        'code' => 'string',
        'localisation' => 'string',
        'contact' => 'string',
        'responsable' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bascule' => 'required',
        'code' => 'required',
        'localisation' => 'required'
    ];

    
}
