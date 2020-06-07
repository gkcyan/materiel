<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProduitPrix
 * @package App\Models
 * @version June 5, 2020, 9:54 am UTC
 *
 * @property \App\Models\Produit $produit
 * @property integer $produit_id
 * @property string $prix
 * @property string $debut
 * @property string $fin
 * @property integer $statut
 */
class ProduitPrix extends Model
{
    use SoftDeletes;

    public $table = 'produit_prixes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'produit_id',
        'prix',
        'prix_remise',
        'debut',
        'fin',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'produit_id' => 'integer',
        'prix' => 'string',
        'prix_remise'=>'string',
        'debut' => 'date',
        'fin' => 'date',
        'statut' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'produit_id' => 'required',
        'prix' => 'required',
        'debut' => 'required',
        'fin' => 'required',
        'statut' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function produit()
    {
        return $this->belongsTo(\App\Models\Produit::class, 'produit_id');
    }
}
