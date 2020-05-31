<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class entreprise
 * @package App\Models
 * @version May 20, 2020, 11:51 am UTC
 *
 * @property string $libelle
 * @property string $actif
 */
class Entreprise extends Model
{
    use SoftDeletes;

    public $table = 'entreprises';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'libelle',
        'actif',
        'created_at',
        'updated_at'
        
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'required'
    ];

    
}
