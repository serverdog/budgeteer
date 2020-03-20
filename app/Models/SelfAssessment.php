<?php

namespace App\Models;

use Eloquent as Model;
use App\Scopes\LoggedInUserScope;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SelfAssessment
 * @package App\Models
 * @version March 20, 2020, 1:09 pm UTC
 *
 * @property \App\Models\User user
 * @property integer user_id
 * @property string year
 * @property string name
 * @property number total_dividends
 * @property number share
 * @property number salary
 * @property number savings
 * @property number other
 * @property number july_payment
 * @property boolean active
 */
class SelfAssessment extends Model
{
    use SoftDeletes;

    public $table = 'self_assessments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'year',
        'name',
        'total_dividends',
        'share',
        'salary',
        'savings',
        'other',
        'july_payment',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'year' => 'string',
        'name' => 'string',
        'total_dividends' => 'float',
        'share' => 'float',
        'salary' => 'float',
        'savings' => 'float',
        'other' => 'float',
        'july_payment' => 'float',
        'active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public static $years = ['2018/19', '2019/20'];

    public static function getYears()
    {
        return array_combine(self::$years, self::$years);
    }


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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
