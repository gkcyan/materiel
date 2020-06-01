<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EnginModele
 * @package App\Models
 * @version June 1, 2020, 12:20 am UTC
 *
 * @property \App\Models\EnginMarque $marque
 * @property string $modele
 * @property string $code
 * @property integer $marque_id
 * @property string $annee
 * @property integer $statut
 */
class EnginModele extends Model
{
    use SoftDeletes;

    public $table = 'engin_modeles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'modele',
        'code',
        'marque_id',
        'annee',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'modele' => 'string',
        'code' => 'string',
        'marque_id' => 'integer',
        'annee' => 'date',
        'statut' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'modele' => 'required',
        'code' => 'required',
        'marque_id' => 'required',
        'statut' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function marque()
    {
        return $this->belongsTo(\App\Models\EnginMarque::class, 'marque_id');
    }
}
