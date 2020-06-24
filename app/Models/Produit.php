<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produit
 * @package App\Models
 * @version May 31, 2020, 9:51 pm UTC
 *
 * @property \App\Models\Categorie $categorie
 * @property string $produit
 * @property string $description
 * @property integer $categorie_id
 * @property string $code
 * @property integer $statut
 */
class Produit extends Model
{
    use SoftDeletes;

    public $table = 'produits';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'produit',
        'description',
        'categorie_id',
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
        'produit' => 'string',
        'description' => 'string',
        'categorie_id' => 'integer',
        'code' => 'string',
        'statut' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'produit' => 'required',
        'categorie_id' => 'required',
        'code' => 'required',
        'statut' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categorie()
    {
        return $this->belongsTo(\App\Models\Categorie::class, 'categorie_id');
    }
    public function engin()
    {
        return $this->hasMany(\App\Models\Engin::class,'produit_id');
    }
}
