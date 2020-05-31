<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Categorie
 * @package App\Models
 * @version May 31, 2020, 7:53 pm UTC
 *
 * @property string $categorie
 * @property string $description
 * @property integer $statut
 * @property string $code_prodtui
 */
class Categorie extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'categorie',
        'description',
        'statut',
        'code_prodtui'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categorie' => 'string',
        'description' => 'string',
        'statut' => 'integer',
        'code_prodtui' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'categorie' => 'required|max:30|unique:categories',
        'statut' => 'required',
        'code_prodtui' => 'required|max:10|unique:categories'
    ];

    
}
