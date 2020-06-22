<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TypeFournisseur
 * @package App\Models
 * @version June 22, 2020, 3:43 pm UTC
 *
 * @property string $type_fournisseur
 * @property string $code_type_fournisseur
 * @property string $observation
 * @property string $autor_creat
 * @property string $autor_update
 */
class TypeFournisseur extends Model
{
    use SoftDeletes;

    public $table = 'type_fournisseurs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type_fournisseur',
        'code_type_fournisseur',
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
        'type_fournisseur' => 'string',
        'code_type_fournisseur' => 'string',
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
        'type_fournisseur' => 'required',
        'code_type_fournisseur' => 'required'
    ];

    
}
