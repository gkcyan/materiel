<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pompiste
 * @package App\Models
 * @version May 31, 2020, 4:30 pm UTC
 *
 * @property \App\Models\Station $station
 * @property string $nom
 * @property string $prenom
 * @property string $contact
 * @property integer $station_id
 * @property integer $emploi
 * @property integer $contrat
 * @property string $code
 */
class Pompiste extends Model
{
    use SoftDeletes;

    public $table = 'pompistes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'prenom',
        'contact',
        'station_id',
        'emploi',
        'contrat',
        'code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'prenom' => 'string',
        'contact' => 'string',
        'station_id' => 'integer',
        'emploi' => 'integer',
        'contrat' => 'integer',
        'code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'station_id' => 'required',
        'emploi' => 'required',
        'contrat' => 'required',
        'code' => 'required|max:10|unique:pompistes'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function station()
    {
        return $this->belongsTo(\App\Models\Station::class, 'station_id');
    }
}
