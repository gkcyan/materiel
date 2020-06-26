<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FactureTicket
 * @package App\Models
 * @version June 25, 2020, 3:36 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $factures
 * @property \App\Models\BasculeData $basculeData
 * @property integer $facture_id
 * @property integer $ticket_id
 */
class FactureTicket extends Model
{
    use SoftDeletes;

    public $table = 'facture_tickets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'facture_id',
        'ticket_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'facture_id' => 'integer',
        'ticket_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'facture_id' => 'required',
        'ticket_id' => 'required'
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
    public function basculeData()
    {
        return $this->hasOne(\App\Models\BasculeData::class, 'ticket_id');
    }
}
