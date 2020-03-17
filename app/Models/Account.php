<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Account
 * @package App\Models
 * @version February 7, 2020, 1:43 pm UTC
 *
 * @property \App\Models\Accounttype accounttype
 * @property \App\Models\Currency currency
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection balances
 * @property integer user_id
 * @property integer accounttype_id
 * @property integer currency_id
 * @property number interest_rate
 */
class Account extends Model
{
    use SoftDeletes;

    public $table = 'accounts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'name',
        'accounttype_id',
        'currency_id',
        'interest_rate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'accounttype_id' => 'integer',
        'currency_id' => 'integer',
        'interest_rate' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id'        => 'required',
        'name'           => 'required',
        'accounttype_id' => 'required',
        'currency_id'    => 'required'
       
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function accounttype()
    {
        return $this->belongsTo(\App\Models\Accounttype::class, 'accounttype_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function currency()
    {
        return $this->belongsTo(\App\Models\Currency::class, 'currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function balances()
    {
        return $this->hasMany(\App\Models\Balance::class, 'account_id');
    }
}
