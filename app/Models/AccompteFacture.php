<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AccompteFacture
 * @package App\Models
 * @version June 25, 2020, 4:19 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $factures
 * @property \App\Models\Accompte $accompte
 * @property integer $facture_id
 * @property integer $accompte_id
 */
class AccompteFacture extends Model
{
    use SoftDeletes;

    public $table = 'accompte_factures';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'facture_id',
        'accompte_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'facture_id' => 'integer',
        'accompte_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'facture_id' => 'required'
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
    public function accompte()
    {
        return $this->hasOne(\App\Models\Accompte::class, 'accompte_id');
    }
}
