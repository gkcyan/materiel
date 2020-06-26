<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Facture
 * @package App\Models
 * @version June 25, 2020, 11:44 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $fournisseurs
 * @property integer $fournisseur_id
 * @property string $reference
 * @property string $description
 * @property string $date
 * @property integer $statut
 */
class Facture extends Model
{
    use SoftDeletes;

    public $table = 'factures';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'fournisseur_id',
        'reference',
        'description',
        'date',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fournisseur_id' => 'integer',
        'reference' => 'string',
        'description' => 'string',
        'date' => 'date',
        'statut' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fournisseur_id' => 'required',
        'reference' => 'required',
        'description' => 'required',
        'date' => 'required',
        'statut' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function fournisseurs()
    {
        return $this->hasMany(\App\Models\Fournisseur::class, 'fournisseur_id');
    }
}
