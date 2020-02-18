<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Liability
 * @package App\Models
 * @version February 7, 2020, 1:43 pm UTC
 *
 * @property \App\Models\Period period
 * @property \App\Models\User user
 * @property integer user_id
 * @property integer period_id
 * @property number amount
 * @property string due
 */
class Liability extends Model
{
    use SoftDeletes;

    public $table = 'liabilities';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'period_id',
        'amount',
        'due'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'period_id' => 'integer',
        'amount' => 'float',
        'due' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'period_id' => 'required',
        'amount' => 'required',
        'due' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function period()
    {
        return $this->belongsTo(\App\Models\Period::class, 'period_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
