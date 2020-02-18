<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Period
 * @package App\Models
 * @version February 7, 2020, 1:44 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection liabilities
 * @property string name
 * @property string method
 * @property integer amount
 */
class Period extends Model
{
    use SoftDeletes;

    public $table = 'periods';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'method',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'method' => 'string',
        'amount' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'method' => 'required',
        'amount' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function liabilities()
    {
        return $this->hasMany(\App\Models\Liability::class, 'period_id');
    }
}
