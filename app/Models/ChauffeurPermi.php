<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ChauffeurPermi
 * @package App\Models
 * @version June 2, 2020, 3:58 pm UTC
 *
 * @property string $permis_ref
 * @property string $categories
 * @property string $date_validitie
 * @property string $date_exp
 * @property string $autor_creat
 * @property string $autor_update
 */
class ChauffeurPermi extends Model
{
    use SoftDeletes;

    public $table = 'chauffeur_permis';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'permis_ref',
        'categories',
        'date_validitie',
        'date_exp',
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
        'permis_ref' => 'string',
        'categories' => 'string',
        'autor_creat' => 'string',
        'autor_update' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'permis_ref' => 'required',
        'categories' => 'required',
        'date_validitie' => 'required',
        'date_exp' => 'required'
    ];

    
}
