<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Chauffeur
 * @package App\Models
 * @version June 2, 2020, 3:19 pm UTC
 *
 * @property \App\Models\Entreprise $entreprise
 * @property string $photo
 * @property string $nom
 * @property string $prenom
 * @property string $contact
 * @property integer $entreprise_id
 * @property integer $contrat
 * @property string $date_contrat
 * @property string $date_naissance
 * @property string $lieu_naissance
 * @property string $ethnie
 * @property string $religion
 * @property string $sit_maritale
 * @property string $groupe_sang
 * @property number $nb_enfant
 * @property string $cni_ref
 * @property string $permis_ref
 * @property string $residence
 * @property string $code
 * @property string $autor_creat
 * @property string $autor_update
 */
class Chauffeur extends Model
{
    use SoftDeletes;

    public $table = 'chauffeurs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'photo',
        'nom',
        'prenom',
        'contact',
        'entreprise_id',
        'contrat',
        'date_contrat',
        'date_naissance',
        'lieu_naissance',
        'ethnie',
        'religion',
        'sit_maritale',
        'groupe_sang',
        'nb_enfant',
        'cni_ref',
        'permis_ref',
        'residence',
        'code',
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
        'photo' => 'string',
        'nom' => 'string',
        'prenom' => 'string',
        'contact' => 'string',
        'entreprise_id' => 'integer',
        'contrat' => 'integer',
        'lieu_naissance' => 'string',
        'ethnie' => 'string',
        'religion' => 'string',
        'sit_maritale' => 'string',
        'groupe_sang' => 'string',
        'cni_ref' => 'string',
        'permis_ref' => 'string',
        'residence' => 'string',
        'code' => 'string',
        'autor_creat' => 'string',
        'autor_update' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'entreprise_id' => 'required',
        'contrat' => 'required',
        'date_contrat' => 'required',
        'date_naissance' => 'required',
        'lieu_naissance' => 'required',
        'sit_maritale' => 'required',
        'groupe_sang' => 'required',
        'cni_ref' => 'required',
        'permis_ref' => 'required',
        'residence' => 'required',
        'code' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function entreprise()
    {
        return $this->belongsTo(\App\Models\Entreprise::class, 'entreprise_id');
    }
}
