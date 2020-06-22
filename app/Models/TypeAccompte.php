<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TypeAccompte
 * @package App\Models
 * @version June 22, 2020, 4:17 pm UTC
 *
 * @property string $type_accompte
 * @property string $code_type_accompte
 * @property string $description
 * @property integer $statut
 * @property string $autor_creat
 * @property string $autor_update
 */
class TypeAccompte extends Model
{
    use SoftDeletes;

    public $table = 'type_accomptes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type_accompte',
        'code_type_accompte',
        'description',
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
        'type_accompte' => 'string',
        'code_type_accompte' => 'string',
        'description' => 'string',
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
        'type_accompte' => 'required',
        'code_type_accompte' => 'required',
        'statut' => 'required'
    ];

    
}
