<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Accompte
 * @package App\Models
 * @version June 22, 2020, 9:18 pm UTC
 *
 * @property \App\Models\TypeAccompte $typeAccompte
 * @property \App\Models\Fournisseur $fournisseur
 * @property integer $type_accompte_id
 * @property integer $fournisseur_id
 * @property string $description
 * @property integer $Montant
 * @property string $date
 * @property string $caisse
 * @property string $caissier
 * @property string $recup_par
 * @property string $autor_creat
 * @property string $autor_update
 */
class Accompte extends Model
{
    use SoftDeletes;

    public $table = 'accomptes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type_accompte_id',
        'fournisseur_id',
        'description',
        'Montant',
        'date',
        'caisse',
        'caissier',
        'recup_par',
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
        'type_accompte_id' => 'integer',
        'fournisseur_id' => 'integer',
        'description' => 'string',
        'Montant' => 'integer',
        'date' => 'date',
        'caisse' => 'string',
        'caissier' => 'string',
        'recup_par' => 'string',
        'autor_creat' => 'string',
        'autor_update' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type_accompte_id' => 'required',
        'fournisseur_id' => 'required',
        'description' => 'required',
        'Montant' => 'required',
        'date' => 'required',
        'caisse' => 'required',
        'caissier' => 'required',
        'recup_par' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeAccompte()
    {
        return $this->belongsTo(\App\Models\TypeAccompte::class, 'type_accompte_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fournisseur()
    {
        return $this->belongsTo(\App\Models\Fournisseur::class, 'fournisseur_id');
    }
}
