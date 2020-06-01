<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EnginType
 * @package App\Models
 * @version June 1, 2020, 2:33 am UTC
 *
 * @property string $type
 * @property string $code
 * @property integer $statut
 */
class EnginType extends Model
{
    use SoftDeletes;

    public $table = 'engin_types';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'code',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'code' => 'string',
        'statut' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required',
        'code' => 'required',
        'statut' => 'required'
    ];

    
}
