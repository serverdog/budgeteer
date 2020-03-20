<?php

namespace App\Models;

use Eloquent as Model;
use App\Scopes\LoggedInUserScope;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Income
 * @package App\Models
 * @version March 20, 2020, 12:18 pm UTC
 *
 * @property \App\Models\Currency currency
 * @property \App\Models\User user
 * @property integer user_id
 * @property integer currency_id
 * @property integer dayofmonth
 * @property string name
 * @property number amount
 */
class Income extends Model
{
    use SoftDeletes;

    public $table = 'incomes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'currency_id',
        'dayofmonth',
        'name',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'currency_id' => 'integer',
        'dayofmonth' => 'integer',
        'name' => 'string',
        'amount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'currency_id' => 'required',
        'dayofmonth' => 'required',
        'name' => 'required',
        'amount' => 'required'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new LoggedInUserScope);
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
}
