<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CarburantFacture
 * @package App\Models
 * @version June 25, 2020, 2:34 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $factures
 * @property \App\Models\VentePetrolier $ventePetrolier
 * @property integer $facture_id
 * @property integer $ventepetrolier_id
 */
class CarburantFacture extends Model
{
    use SoftDeletes;

    public $table = 'carburant_factures';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'facture_id',
        'ventepetrolier_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'facture_id' => 'integer',
        'ventepetrolier_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'facture_id' => 'required',
        'ventepetrolier_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function factures()
    {
        return $this->hasMany(\App\Models\Facture::class, 'facture_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function ventePetrolier()
    {
        return $this->hasOne(\App\Models\VentePetrolier::class, 'ventepetrolier_id');
    }
}
