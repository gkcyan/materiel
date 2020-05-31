<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Petrolier
 * @package App\Models
 * @version May 31, 2020, 2:47 pm UTC
 *
 * @property string $petrolier
 */
class Petrolier extends Model
{
    use SoftDeletes;

    public $table = 'petroliers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'petrolier'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'petrolier' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'petrolier' => 'required'
    ];

    
}
