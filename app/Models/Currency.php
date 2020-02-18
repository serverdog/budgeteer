<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Currency
 * @package App\Models
 * @version February 7, 2020, 1:43 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection accounts
 * @property \Illuminate\Database\Eloquent\Collection balances
 * @property string name
 * @property string code
 */
class Currency extends Model
{
    use SoftDeletes;

    public $table = 'currencies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'code' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accounts()
    {
        return $this->hasMany(\App\Models\Account::class, 'currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function balances()
    {
        return $this->hasMany(\App\Models\Balance::class, 'currency_id');
    }
}
