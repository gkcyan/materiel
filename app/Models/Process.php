<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Process
 * @package App\Models
 * @version June 2, 2020, 3:02 pm UTC
 *
 * @property 
 * @property 
 * @property 
 * @property 
 * @property string $processus
 * @property string $finalite
 * @property string $pilote
 * @property string $controleur
 * @property string $code
 * @property string $autor_creat
 * @property string $autor_update
 */
class Process extends Model
{
    use SoftDeletes;

    public $table = 'processes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'processus',
        'finalite',
        'pilote',
        'controleur',
        'code',
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
        'processus' => 'string',
        'finalite' => 'string',
        'pilote' => 'string',
        'controleur' => 'string',
        'code' => 'string',
        'autor_creat' => 'string',
        'autor_update' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'processus' => 'required',
        'finalite' => 'required',
        'pilote' => 'required',
        'controleur' => 'required',
        'code' => 'required'
    ];

    
}
