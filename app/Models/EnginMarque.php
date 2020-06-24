<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EnginMarque
 * @package App\Models
 * @version May 31, 2020, 11:59 pm UTC
 *
 * @property string $marque
 * @property string $code
 * @property integer $statut
 */
class EnginMarque extends Model
{
    use SoftDeletes;

    public $table = 'engin_marques';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'marque',
        'code',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'marque' => 'string',
        'code' => 'string',
        'statut' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'marque' => 'required',
        'code' => 'required',
        'statut' => 'required'
    ];

    public function engin()
    {
        return $this->hasMany(\App\Models\Engin::class,'marque_id');
    }
}
