<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Activite
 * @package App\Models
 * @version June 2, 2020, 3:06 pm UTC
 *
 * @property \App\Models\Process $process
 * @property 
 * @property 
 * @property 
 * @property 
 * @property integer $process_id
 * @property string $activite
 * @property integer $statut
 * @property string $finalite
 * @property string $pilote
 * @property string $controleur
 * @property string $code
 * @property string $autor_creat
 * @property string $autor_update
 */
class Activite extends Model
{
    use SoftDeletes;

    public $table = 'activites';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'process_id',
        'activite',
        'statut',
        'finalite',
        'pilote',
        'controleur',
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
        'process_id' => 'integer',
        'activite' => 'string',
        'statut' => 'integer',
        'finalite' => 'string',
        'pilote' => 'string',
        'controleur' => 'string',
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
        'process_id' => 'required',
        'activite' => 'required',
        'statut' => 'required',
        'finalite' => 'required',
        'pilote' => 'required',
        'controleur' => 'required',
        'code' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function process()
    {
        return $this->belongsTo(\App\Models\Process::class, 'process_id');
    }
}
