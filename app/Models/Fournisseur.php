<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fournisseur
 * @package App\Models
 * @version June 22, 2020, 8:02 pm UTC
 *
 * @property \App\Models\TypeFournisseur $typeZone
 * @property string $raison_so
 * @property string $compte_contr
 * @property string $reg_com
 * @property string $interlocuteur 
 * @property string $contact
 * @property string $email
 * @property integer $statut
 * @property string $siege
 * @property string $observation
 * @property integer $type_fournisseur_id
 * @property string $autor_creat
 * @property string $autor_update
 */
class Fournisseur extends Model
{
    use SoftDeletes;

    public $table = 'fournisseurs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'raison_so',
        'compte_contr',
        'reg_com',
        'interlocuteur',
        'contact',
        'email',
        'statut',
        'siege',
        'observation',
        'type_fournisseur_id',
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
        'raison_so' => 'string',
        'compte_contr' => 'string',
        'reg_com' => 'string',
        'interlocuteur' => 'string',
        'contact' => 'string',
        'email' => 'string',
        'statut' => 'integer',
        'siege' => 'string',
        'observation' => 'string',
        'type_fournisseur_id' => 'integer',
        'autor_creat' => 'string',
        'autor_update' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'raison_so' => 'required',
        'compte_contr' => 'required',
        'reg_com' => 'required',
        'interlocuteur' => 'required',
        'contact' => 'required',
        'email' => 'required',
        'statut' => 'required',
        'type_fournisseur_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeZone()
    {
        return $this->belongsTo(\App\Models\TypeFournisseur::class, 'type_fournisseur_id');
    }
}
