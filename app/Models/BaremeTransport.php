<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BaremeTransport
 * @package App\Models
 * @version June 7, 2020, 6:11 pm UTC
 *
 * @property \App\Models\ZoneCollece $origine
 * @property \App\Models\ZoneCollece $destination
 * @property integer $origine_id
 * @property integer $destination_id
 * @property string $distance
 * @property string $cout
 * @property string $observation
 * @property string $autor_creat
 * @property string $autor_update
 */
class BaremeTransport extends Model
{
    use SoftDeletes;

    public $table = 'bareme_transports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'origine_id',
        'destination_id',
        'distance',
        'cout',
        'observation',
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
        'origine_id' => 'integer',
        'destination_id' => 'integer',
        'distance' => 'string',
        'cout' => 'string',
        'observation' => 'string',
        'autor_creat' => 'string',
        'autor_update' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'origine_id' => 'required',
        'destination_id' => 'required',
        'distance' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function origine()
    {
        return $this->belongsTo(\App\Models\ZoneCollece::class, 'origine_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function destination()
    {
        return $this->belongsTo(\App\Models\ZoneCollece::class, 'destination_id');
    }
}
