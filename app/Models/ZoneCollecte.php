<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ZoneCollecte
 * @package App\Models
 * @version June 7, 2020, 4:50 pm UTC
 *
 * @property \App\Models\TypeZone $typeZone
 * @property string $zone
 * @property string $code_zone
 * @property integer $type_zone_id
 * @property string $rayon
 * @property string $gps_coord
 * @property string $observation
 * @property string $autor_creat
 * @property string $autor_update
 */
class ZoneCollecte extends Model
{
    use SoftDeletes;

    public $table = 'zone_collectes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'zone',
        'code_zone',
        'type_zone_id',
        'rayon',
        'gps_coord',
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
        'zone' => 'string',
        'code_zone' => 'string',
        'type_zone_id' => 'integer',
        'rayon' => 'string',
        'gps_coord' => 'string',
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
        'zone' => 'required',
        'code_zone' => 'required',
        'type_zone_id' => 'required',
        'rayon' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeZone()
    {
        return $this->belongsTo(\App\Models\TypeZone::class, 'type_zone_id');
    }
}
