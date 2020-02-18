<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Balance
 * @package App\Models
 * @version February 7, 2020, 1:42 pm UTC
 *
 * @property \App\Models\Account account
 * @property \App\Models\Accounttype accounttype
 * @property \App\Models\Currency currency
 * @property integer user_id
 * @property integer account_id
 * @property integer accounttype_id
 * @property integer currency_id
 * @property string date
 * @property number amount
 * @property boolean latest
 */
class Balance extends Model
{
    use SoftDeletes;

    public $table = 'balances';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'account_id',
        'accounttype_id',
        'currency_id',
        'date',
        'amount',
        'latest'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'account_id' => 'integer',
        'accounttype_id' => 'integer',
        'currency_id' => 'integer',
        'date' => 'date',
        'amount' => 'float',
        'latest' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'account_id' => 'required',
        'accounttype_id' => 'required',
        'currency_id' => 'required',
        'date' => 'required',
        'amount' => 'required',
        'latest' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function account()
    {
        return $this->belongsTo(\App\Models\Account::class, 'account_id');
    }

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
}
