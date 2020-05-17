<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Entreprise
 * @package App\Models
 * @version May 16, 2020, 11:49 pm UTC
 *
 * @property string $libelle
 * @property string $actif
 */
class Entreprise extends Model
{
    use SoftDeletes;

    public $table = 'entreprises';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'libelle',
        'actif'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'libelle' => 'string',
        'actif' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'required'
        //'actif' => 'required'
    ];

    
}
