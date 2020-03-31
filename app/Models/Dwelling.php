<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Dwelling
 * @package App\Models
 * @version March 31, 2020, 11:03 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection averageUtilities
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string name
 */
class Dwelling extends Model
{
    use SoftDeletes;

    public $table = 'dwellings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function averageUtilities()
    {
        return $this->hasMany(\App\Models\AverageUtility::class, 'dwelling_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'dwelling_id');
    }
}
