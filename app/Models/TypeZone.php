<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TypeZone
 * @package App\Models
 * @version June 7, 2020, 4:25 pm UTC
 *
 * @property string $type_zone
 * @property string $code_type_zone
 * @property string $observation
 * @property string $autor_creat
 * @property string $autor_update
 */
class TypeZone extends Model
{
    use SoftDeletes;

    public $table = 'type_zones';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type_zone',
        'code_type_zone',
        'observation',
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
        'type_zone' => 'string',
        'code_type_zone' => 'string',
        'observation' => 'string',
        'autor_creat' => 'string',
        'autor_update' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type_zone' => 'required',
        'code_type_zone' => 'required'
    ];

    
}
