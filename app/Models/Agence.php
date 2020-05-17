<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agence
 * @package App\Models
 * @version May 17, 2020, 12:09 am UTC
 *
 * @property string $libelle
 * @property string $entreprise_id
 */
class Agence extends Model
{
    use SoftDeletes;

    public $table = 'agences';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'libelle',
        'entreprise_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'libelle' => 'string',
        'entreprise_id' => 'string'
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
