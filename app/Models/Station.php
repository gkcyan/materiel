<?php

namespace App\Models;

use App\Models\Petrolier;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Station
 * @package App\Models
 * @version May 31, 2020, 3:36 pm UTC
 *
 * @property \App\Models\Petrolier $petrolier
 * @property string $station
 * @property integer $petrolier_id
 */
class Station extends Model
{
    use SoftDeletes;

    public $table = 'stations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'station',
        'petrolier_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'station' => 'string',
        'petrolier_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'station' => 'required',
        'petrolier_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function petrolier()
    {
        return $this->belongsTo(\App\Models\Petrolier::class, 'petrolier_id');
    }
}
