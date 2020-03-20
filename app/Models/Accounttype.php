<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Accounttype
 * @package App\Models
 * @version February 7, 2020, 1:43 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection accounts
 * @property \Illuminate\Database\Eloquent\Collection balances
 * @property string name
 */
class Accounttype extends Model
{
    use SoftDeletes;

    public $table = 'accounttypes';
    
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
     * $debtAccountTypes
     * 
     * Which accounts are loans from other institutions
     * We need these added to the Liabilities / Loans
     *
     * @var array
     */
    public static $debtAccountTypes = [4,5,8,9,10,11];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accounts()
    {
        return $this->hasMany(\App\Models\Account::class, 'accounttype_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function balances()
    {
        return $this->hasMany(\App\Models\Balance::class, 'accounttype_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'account_category_id');
    }
}
